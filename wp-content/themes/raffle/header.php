<!doctype html>

<!--[if lt IE 7]>
<html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]>
<html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]>
<html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!-->
<html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

<head>
 	 <meta name="robots" content="nofollow">

  
    <meta charset="utf-8">

    <?php // force Internet Explorer to use the latest rendering engine available ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title><?php echo get_bloginfo('name') ?><?php wp_title(); ?></title>

    <?php // mobile meta (hooray!) ?>
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <!--[if IE]>
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
    <![endif]-->
    <?php // or, set /favicon.ico for IE10 win ?>


    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <?php wp_head(); ?>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body <?php body_class('full-page'); ?> >


<header>
    <div class="inner-header">
        <div class="top-nav hidden-xs">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <div class="top-area">
                            <p><?php echo ot_get_option('shipping') ?></p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <div class="top-area">
                            <p><?php echo ot_get_option('delivery') ?></p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <div class="top-area">
                            <p><?php echo ot_get_option('proof') ?></p>
                        </div>
                    </div>
                    <!--      <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                           <div class="top-area">
                             <ul class="list-unstyled">
                               <li><a href="" title="">View Cart:</a><i class="fa fa-cart-plus fa-2x"></i></li>
                             </ul>
                           </div>
                         </div> -->
                </div>
            </div>
        </div>

        <div class="header">
            <nav class="navbar navbar-default" role="navigation">
                <div class="container">
                    <div class="row">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse"
                                        data-target=".navbar-ex1-collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a href="/" class=""><img src="<?php echo ot_get_option('logo'); ?>"
                                                          class="img-responsive"
                                                          alt="<?php echo bloginfo('name') ?>"></a>
                            </div>
                        </div>
                        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                            <div class="timing">
                                <ul class="list-unstyled list-inline">
                                    <li><i class="fa fa-phone"></i><?php echo ot_get_option('office_time') ?></li>
                                    <li><i class="fa fa-clock-o"></i><?php echo ot_get_option('phone_no_1') ?></li>
                                    <?php if (is_page('ticket-pricing-colors')) : ?>
                                        <li><a class="" href="" title=""><img
                                                    src="<?php echo get_template_directory_uri() ?>/assets/img/img-3.png"
                                                    alt=""></a></li>

                                        <li><a class="" href="" title=""><img
                                                    src="<?php echo get_template_directory_uri() ?>/assets/img/img-4.png"
                                                    alt=""></a></li>

                                        <li><a class="" href="" title=""><img
                                                    src="<?php echo get_template_directory_uri() ?>/assets/img/img-5.png"
                                                    alt=""></a></li>

                                        <li><a class="" href="" title=""><img
                                                    src="<?php echo get_template_directory_uri() ?>/assets/img/img-6.png"
                                                    alt=""></a></li>

                                        <li><a class="" href="" title=""><img
                                                    src="<?php echo get_template_directory_uri() ?>/assets/img/img-7.png"
                                                    alt=""></a></li>
                                    <?php else : ?>
                                        <li><a class="btn btn-danger" href="/ticket-pricing-colors"
                                               title="Start Your order">Start Your order</a></li>
                                    <?php endif ?>
                                </ul>
                            </div>
                            <div class="collapse navbar-collapse navbar-ex1-collapse">

                                <?php /**
                                 * Displays a navigation menu
                                 * @param array $args Arguments
                                 */
                                $args = array(
                                    'menu_class' => 'nav navbar-nav top-bar-nav',
                                    'menu' => 'Main Menu',
                                    'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
                                    'walker' => new wp_bootstrap_navwalker()
                                );
                                wp_nav_menu($args);
                                ?>
                            </div>
                            <!-- /.navbar-collapse -->

                        </div>
                    </div>
            </nav>
            </nav>
        </div>
    </div>
</header>