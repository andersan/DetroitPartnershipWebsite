<!DOCTYPE html>
	
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
	<!-- detect screen size (for responsive design) -->
	<meta name="viewport" content="width=device-width, initial-scale=1"/>

	<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>" />
	<title><?php wp_title('|', true, 'right'); ?></title>

	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<?php wp_head(); ?>

	<!-- bootstrap mobile/tablet dropdown menu and image carousel -->

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<link rel="stylesheet" href="/wp-content/themes/pitch-child-responsive/css/bootstrap.min.css">
	<script src="/wp-content/themes/pitch-child-responsive/js/bootstrap.min.js"></script>

</head>

<body <?php body_class() ?>>

<?php if(siteorigin_setting('general_topbar_menu')) : ?>
	<div id="topbar">
		<div class="container">
			<?php
				wp_nav_menu(array(
					'theme_location' => 'topbar',
					'menu_id' => 'topbar-menu',
					'depth' => 2,
					'fallback_cb' => 'pitch_fallback_nav',
					'walker' => new Pitch_Walker_Nav_Menu,
				));
			?>
			<div class="clear"></div>
		</div>
	</div>
<?php endif; ?>

<?php if (!wp_is_mobile()) : ?>

<div id="logo">
	<div class="container">
		<!--<a href="<?php echo esc_url(home_url()) ?>" title="<?php echo esc_attr(get_bloginfo('name').' - '.get_bloginfo('description')); ?>" id="logo-link">
			<?php if(function_exists('get_custom_header') && !empty(get_custom_header()->url)) : ?>
				<img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" title="<?php echo esc_attr(get_bloginfo('name')) ?>" alt="<?php echo esc_attr(get_bloginfo('name').' - '.get_bloginfo('description')) ?>" />
			<?php else : ?>
				<h1><?php echo esc_html(get_bloginfo('name')) ?></h1>
			<?php endif; ?>
		</a>-->
		
		<?php if(siteorigin_setting('general_search_input')) get_search_form() ?>
	</div>
</div>

<?php endif; ?>

<!-- Navbar... -->
<div id="mainmenu" class="<?php echo siteorigin_setting('general_scale_main_menu') ? 'scaled' : '' ?>">
	<div class="container">
		<nav class="navbar navbar-default" role="navigation">
		  <div class="container-fluid">
		    
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header" style="height: 100px">
		      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapse_nav">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="http://thedetroitpartnership.org">
						<?php if(function_exists('get_custom_header') && !empty(get_custom_header()->url)) : ?>
						<img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" title="<?php echo esc_attr(get_bloginfo('name')) ?>" alt="<?php echo esc_attr(get_bloginfo('name').' - '.get_bloginfo('description')) ?>" />
						<?php else : ?>	
						<?php echo esc_html(get_bloginfo('name')) ?>
						<?php endif; ?>
		      </a>
		    </div>

					<!-- wordpress nav... uses "wp_bootstrap_navwalker" to gen a menu w bootstrap tags/classes -->
					<!-- used under GNU general public license  -->
		        <?php
		            wp_nav_menu( array(
		                'menu'              => 'primary',
		                'theme_location'    => 'primary',
		                'depth'             => 2,
		                'container'         => 'div',
		                'container_class'   => 'collapse navbar-collapse',
		        				'container_id'      => 'collapse_nav',
		                'menu_class'        => 'nav navbar-nav',
		                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
		                'walker'            => new wp_bootstrap_navwalker())
		            );
		        ?>
		    </div>
		</nav>
		
		<!-- wp search form
		<?php if(siteorigin_setting('general_search_input')) get_search_form() ?>
 -->

			<!-- bootstrap search form
			<form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <?php if(siteorigin_setting('general_search_input')) get_search_form() ?>
        </div>
      </form> -->

		<!-- removed old main menu... un-comment this code to make it usable again -->
		<!--<?php
			wp_nav_menu(array(
				'theme_location' => 'main',
				'menu_id' => 'mainmenu-menu',
				'fallback_cb' => 'pitch_fallback_nav',
			));	
		?>-->
	</div>
</div>