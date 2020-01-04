<!DOCTYPE html>
<html lang="en">
	<head>
		
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
		
		<link rel="icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" type="image/x-icon" />
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
		<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?>" href="<?php bloginfo('rss2_url'); ?>" />
		<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?>" href="<?php bloginfo('atom_url'); ?>" />
		
		
		<?php wp_head(); ?>
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>" />
	</head>
	
	<body <?php body_class(); ?>>
    <div class="container-fluid">
        <header id="masthead" class="site-header navbar-static-top navbar-dark mb-3 pt-2" role="banner">
                <nav class="navbar navbar-expand-lg p-0">
                    <a class="navbar-brand p-0" id="logo_main" href="<?php echo esc_url( home_url( '/' )); ?>">
                            <h1 class="d-inline">SoSa</h1>
                            <h2 class="d-inline">Blog</h2>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-nav" aria-controls="" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
	                <?php
	
	                wp_nav_menu(
			                array(
					                'theme_location' => 'header-menu-nav',
                                    'container'       => 'div',
                                    'container_id'    => 'main-nav',
					                'container_class' => 'collapse navbar-collapse ml-3 mt-3',
					                'menu_id'         => false,
					                'menu_class'      => 'navbar-nav',
					                'depth'           => 3,
					                'fallback_cb'     => 'navwalker::fallback',
					                'walker'          => new navwalker()
			                )
	                );
	
	                ?>

                    <ul class="navbar-nav ml-auto d-none d-lg-flex" id="navbar_right">
                        
                        <li class="nav-item">
                            <a href="https://blog.sosa.net" class="nav-link">
                                <i class="fal fa-newspaper"></i>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="https://facebook.com/ChatPlayShare" class="nav-link" rel="nofollow noopener">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="https://twitter.com/ChatPlayShare" class="nav-link" rel="nofollow noopener">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="https://youtube.com/c/sosacommunity" class="nav-link" rel="nofollow noopener">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="https://steamcommunity.com/groups/chatplayshare" class="nav-link" rel="nofollow noopener">
                                <i class="fab fa-steam"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="https://www.linkedin.com/company/sosa-community/" class="nav-link" rel="nofollow noopener">
                                <i class="fab fa-linkedin"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
        </header><!-- #masthead -->
		  
		<div id="content">
            <div class="col-12 mx-auto">