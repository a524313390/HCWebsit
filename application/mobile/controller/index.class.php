<?php
/**
 * YzmCMS手机模块 - 商业用途请购买官方授权
 * YzmCMS手机版绑定独立二级域名，查看教程:
 * https://www.yzmask.com/show/768.html
 * 
 * @author           袁志蒙  
 * @license          http://www.yzmcms.com
 * @lastmodify       2022-01-11
 */
 
defined('IN_YZMPHP') or exit('Access Denied');
yzm_base::load_model('content', 'index', 0);

class index{
	
	
	public function __construct() {
		if(!get_config('site_wap_open')) showmsg('手机站点已关闭！', 'stop');
		set_module_theme(get_config('site_wap_theme'));
	}
	
	
	/**
	 * 首页
	 */
	public function init() {
		$site = get_config();
		$seo_title = $site['site_name'];
		$keywords = $site['site_keyword'];
		$description = $site['site_description'];
		include template('mobile', 'index');
	}
	
	
	/**
	 * 栏目列表页
	 */
	public function lists() {
		$catid = isset($_GET['catid']) ? intval($_GET['catid']) : 0;
		if(!$catid) showmsg(L('missing_parameter'),'stop');
		$catinfo = get_category($catid);
		if(!$catinfo) showmsg(L('category_not_existent'),'stop');
		extract($catinfo);
		
		//外部链接
		if($type == 2) showmsg(L('is_jump'), $pclink, 1);
		
		$template = is_childid($catinfo)&&$category_template ? $category_template : $list_template;
		
		//单页面
		if($type == 1){
			$r = D('page')->where(array('catid'=>$catid))->find();
			extract($r);
			$template = $category_template;
		}

		//SEO相关设置
		$site = get_config();
		if(isset($_GET['page'])){
			$seo_title = $seo_title ? $seo_title.'_第'.intval($_GET['page']).'页' : $catname.'_第'.intval($_GET['page']).'页'.get_seo_suffix();
		}else{
			$seo_title = $seo_title ? $seo_title : $catname.get_seo_suffix();
		}
		$keywords = $seo_keywords ? $seo_keywords : $site['site_keyword'];
		$description = $seo_description ? $seo_description : $site['site_description'];
		
		include template('mobile', $template);
	}
	
	
	/**
	 * 内容页
	 */
	public function show() {
		$catid = isset($_GET['catid']) ? intval($_GET['catid']) : 0;
		$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
		if(!$catid || !$id) showmsg(L('missing_parameter'),'stop');
		
		$category = get_category($catid);
		if(!$category) showmsg(L('category_not_existent'),'stop');
		$modelid = $category['modelid'];
		$template = $category['show_template'];
		
		$tablename = get_model($modelid);
		if(!$tablename)  showmsg(L('model_not_existent'),'stop');
		$db = D($tablename);
		$data = $db->where(array('id'=>$id))->find();
		if(!$data || $data['status'] != 1 || $data['catid'] != $catid){
			if(!APP_DEBUG) send_http_status(404);
			showmsg(L('content_not_existent'),'stop');
		}
		extract($data);
		
		//会员组权限检测
		if($groupids_view) {
			$groupid = intval(get_cookie('_groupid'));
			if(!$groupid) showmsg(L('need_login'), url_referer(), 2);
			if($groupid < $groupids_view) showmsg(L('insufficient_authority'), 'stop');
		}
		
		//阅读收费检测
		$allow_read = true;
		if($readpoint){
			$allow_read = content::check_readpoint($data);
			$par[] = $catid.'_'.$id;
			$par[] = $readpoint;
			$par[] = $paytype;
			$par[] = $issystem ? 0 : $userid;
			$pay_url = U('member/member_pay/spend_point', 'par='.string_auth(join('|',$par)));
		} 
		
		//SEO相关设置
		$site = get_config();
		$seo_title = $title.get_seo_suffix();
		
		//更新点击量
		$db->update('`click` = `click`+1', array('id' => $id));

		//内容分页
		if(strpos($content, '_yzm_content_page_') !== false){
			$content = content::content_page($content);
		}	
		
		//内容关键字
		if(get_config('keyword_link')){
			$content = content::keyword_content($content);
		}			
		
		//获取相同分类的上一篇/下一篇内容	
		$pre = $db->field('id,catid,title')->where(array('id<'=>$id , 'status'=>'1' , 'catid'=>$catid))->order('id DESC')->find();
		$next = $db->field('id,catid,title')->where(array('id>'=>$id , 'status'=>'1', 'catid'=>$catid))->order('id ASC')->find();
		$pre = $pre ? '<a href="'.U('mobile/index/show', array('catid'=>$pre['catid'],'id'=>$pre['id'])).'">'.$pre['title'].'</a>' : L('already_is_first');
		$next = $next ? '<a href="'.U('mobile/index/show', array('catid'=>$next['catid'],'id'=>$next['id'])).'">'.$next['title'].'</a>' : L('already_is_last');
		
		include template('mobile', $template);
	}
	

}