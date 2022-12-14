<?php defined('IN_YZMPHP') or exit('No permission resources.'); ?><!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $seo_title;?></title>
    <meta name="author" content="<?php echo $site['site_name'];?>">
    <meta name="keywords" content="<?php echo $keywords;?>" />
    <meta name="description" content="<?php echo $description;?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo STATIC_URL;?>company/img/favicon.png">

    <!-- CSS here -->
    <link rel="stylesheet" href="<?php echo STATIC_URL;?>company/css/preloader.css">
    <link rel="stylesheet" href="<?php echo STATIC_URL;?>company/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo STATIC_URL;?>company/css/slick.css">
    <link rel="stylesheet" href="<?php echo STATIC_URL;?>company/css/meanmenu.css">
    <link rel="stylesheet" href="<?php echo STATIC_URL;?>company/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo STATIC_URL;?>company/css/animate.min.css">
    <link rel="stylesheet" href="<?php echo STATIC_URL;?>company/css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="<?php echo STATIC_URL;?>company/css/fontAwesome5Pro.css">
    <link rel="stylesheet" href="<?php echo STATIC_URL;?>company/css/elegantFont.css">
    <link rel="stylesheet" href="<?php echo STATIC_URL;?>company/css/default.css">
    <link rel="stylesheet" href="<?php echo STATIC_URL;?>company/css/style.css">
    <?php if($id) { ?>
    <link rel="stylesheet" type="text/css" href="<?php echo STATIC_URL;?>plugin/swiper/css/swiper-bundle.min.css" />
    <link rel="stylesheet" href="<?php echo STATIC_URL;?>company/css/carousel.css">
    <script type="text/javascript" src="<?php echo STATIC_URL;?>plugin/swiper/js/swiper-bundle.min.js"></script>
    <?php } ?>
    <script src="<?php echo STATIC_URL;?>company/js/vendor/jquery-3.5.1.min.js"></script>

</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- Add your site or application content here -->

    <!-- preloader area start -->
    <div id="loading">
        <div id="loading-center">
            <div id="loading-center-absolute">
                <div class="object" id="object_one"></div>
                <div class="object" id="object_two"></div>
                <div class="object" id="object_three"></div>
                <div class="object" id="object_four"></div>
                <div class="object" id="object_five"></div>
                <div class="object" id="object_six"></div>
                <div class="object" id="object_seven"></div>
                <div class="object" id="object_eight"></div>
            </div>
        </div>

    </div>
    <!-- preloader area end -->


    <!-- scroll up area start -->
    <div class="scroll-up" id="scroll" style="display: none;">
        <a href="javascript:void(0);"><i class="fas fa-level-up-alt"></i></a>
    </div>
    <!-- scroll up area end -->

    <!-- header area start -->
    <header>
        <div class="header__area p-relative header__transparent">
            <div class="header__top d-none d-md-block">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-6 col-lg-5 col-md-4">
                            <div class="header__social">
                                <ul>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-7 col-md-8">
                            <div class="header__info f-right">
                                <ul>
                                    <li>
                                        <a href="tel:(+468)-254-762-443">
                                            <i class="fal fa-phone-alt"></i>
                                            (+86) 13771921540
                                        </a>
                                    </li>
                                    <li>
                                        <a href="mailto:qhyft@163.com">
                                            <i class="fal fa-envelope"></i>
                                            qhyft@163.com
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="search-toggle">
                                            <i class="far fa-search"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="header__sticky" class="header__bottom">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6">
                            <div class="logo">
                                <a href="index.html">
                                    <img src="<?php echo STATIC_URL;?>company/img/logo/logo.png" alt="logo">
                                </a>
                            </div>
                            <div class="logo-gradient">
                                <a href="index.html">
                                    <img src="<?php echo STATIC_URL;?>company/img/logo/logo-gradient.png" alt="logo">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-6 col-sm-6 col-6">
                            <div class="header__bottom-right d-flex justify-content-end align-items-center">
                                <div class="main-menu">
                                    <nav id="mobile-menu">
                                        <?php $tag = yzm_base::load_sys_class('yzm_tag');if(method_exists($tag, 'nav')) {$data = $tag->nav(array('field'=>'catid,catname,arrchildid,pclink,target','where'=>"parentid=0",'limit'=>'20',));}?>
                                        <ul>
                                            <li><a <?php if(!isset($catid)) { ?> class="current" <?php } ?> href="<?php echo SITE_URL;?>">??????</a>
                                            </li>
                                            <?php if(is_array($data)) foreach($data as $v) { ?>
                                            <li>

                                                <a<?php if(isset($catid) && in_array($catid, explode(',', $v['arrchildid']))) { ?>
                                                    class="current" <?php } ?> href="<?php echo $v['pclink'];?>" target="<?php echo $v['target'];?>">
                                                    <?php echo $v['catname'];?></a>
                                                    <?php if(is_childid($v)) { ?>
                                                    <?php $r = get_childcat($v['catid']);?>
                                                    <ul class="submenu">
                                                        <?php if(is_array($r)) foreach($r as $v) { ?>
                                                        <li><a href="<?php echo $v['pclink'];?>"
                                                                target="<?php echo $v['target'];?>"><?php echo $v['catname'];?></a></li>
                                                        <?php } ?>
                                                    </ul>
                                                    <?php } ?>
                                            </li>
                                            <?php } ?>
                                            <!-- <li><a href="about.html">????????????</a></li>
                                            <li>
                                                <a href="services.html"> ?????? </a>
                                                <ul class="submenu">
                                                    <li><a href="services.html">??????</a></li>
                                                    <li><a href="services-details.html">??????????????????</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="portfolio.html">Insights</a>
                                                <ul class="submenu">
                                                    <li><a href="portfolio.html">????????????</a></li>
                                                    <li><a href="portfolio-details.html">??????????????????</a></li>
                                                    <li><a href="team.html">team</a></li>
                                                    <li><a href="team-details.html">team Details</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="blog.html">????????????</a>
                                                <ul class="submenu">
                                                    <li><a href="blog.html">????????????</a></li>
                                                    <li><a href="blog-details.html">???????????? ??????</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="contact.html">????????????</a></li> -->
                                        </ul>
                                    </nav>
                                </div>
                                <div class="header__btn d-none d-sm-block d-lg-none d-xl-block ml-50">
                                    <a href="contact.html" class="z-btn z-btn-white">??? ???</a>
                                </div>
                                <div class="sidebar__menu d-lg-none">
                                    <div class="sidebar-toggle-btn" id="sidebar-toggle">
                                        <span class="line"></span>
                                        <span class="line"></span>
                                        <span class="line"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header__search-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <form action="#">
                                <input type="text" placeholder="Your Keywords">
                                <button type="submit"><i class="far fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="body-overlay-2"></div>
        </div>
    </header>
    <!-- header area end -->

    <!-- sidebar area start -->
    <section class="sidebar__area">
        <div class="sidebar__wrapper">
            <div class="sidebar__close">
                <button class="sidebar__close-btn" id="sidebar__close-btn">
                    <span><i class="fal fa-times"></i></span>
                    <span>close</span>
                </button>
            </div>
            <div class="sidebar__tab">
                <ul class="nav nav-tabs" id="sidebar-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="menu-tab" data-toggle="tab" href="#menu" role="tab"
                            aria-controls="menu" aria-selected="true">menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="info-tab" data-toggle="tab" href="#info" role="tab" aria-controls="info"
                            aria-selected="false">info</a>
                    </li>
                </ul>
            </div>
            <div class="sidebar__content">
                <div class="tab-content" id="sidebar-tab-content">
                    <div class="tab-pane fade show active" id="menu" role="tabpanel" aria-labelledby="menu-tab">
                        <div class="logo mb-40">
                            <a href="index.html">
                                <img src="<?php echo STATIC_URL;?>company/img/logo/logo.png" alt="logo">
                            </a>
                        </div>
                        <div class="mobile-menu"></div>
                    </div>
                    <div class="tab-pane fade" id="info" role="tabpanel" aria-labelledby="info-tab">
                        <div class="sidebar__info">
                            <div class="logo mb-40">
                                <a href="index.html">
                                    <img src="<?php echo STATIC_URL;?>company/img/logo/logo.png" alt="logo">
                                </a>
                            </div>
                            <p>We must explain to you how all seds this mistakens idea off denouncing pleasures and
                                praising pain was born and I will give you a completed accounts of the system and
                                expound.</p>
                            <a href="contact.html" class="z-btn z-btn-white">contact us</a>
                            <div class="sidebar__search">
                                <form action="#">
                                    <input type="text" placeholder="Your Keywords..">
                                    <button type="submit"><i class="fal fa-search"></i></button>
                                </form>
                            </div>
                            <div class="sidebar__contact mt-30">
                                <ul>
                                    <li>
                                        <div class="icon">
                                            <i class="fal fa-map-marker-alt"></i>
                                        </div>
                                        <div class="text">
                                            <span>????????????????????????????????? ?????????????????????66???</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <i class="fal fa-envelope"></i>
                                        </div>
                                        <div class="text ">
                                            <span><a href="mailto:support@HaiC.3D.com">support@HaiC.3D.com</a></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <i class="fas fa-phone-alt"></i>
                                        </div>
                                        <div class="text">
                                            <span><a href="tel:(+86)-13375184697">(+86) 13375184697</a></span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="body-overlay"></div>
    <!-- sidebar area end -->