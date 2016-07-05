<!DOCTYPE html>
	
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
	<!-- detect screen size (for responsive design) -->
	<script>
		if (matchMedia && window.matchMedia('(min-device-width: 320px) and (max-device-width: 600px)').matches) {
		    document.cookie = 'smartPhone=1; path=/';
		}
		if (matchMedia && window.matchMedia('(min-device-width: 600px) and (max-device-width: 1200px)').matches) {
		    document.cookie = 'tablet=1; path=/';
		}
		if (matchMedia && window.matchMedia('(min-device-width: 1200px)').matches) {
		    document.cookie = 'pc=1; path=/';
		}
		</script>

	<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>" />
	<title><?php wp_title('|', true, 'right'); ?></title>

	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<?php wp_head(); ?>

	<!-- slicknav mobile/tablet dropdown menu -->
	<link rel="stylesheet" type="text/css" media="screen" href="./wp-content/themes/pitch-child-responsive/slicknav.css"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script src="./wp-content/themes/pitch-child-responsive/js/jquery.slicknav.js"></script>
	
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
	
<div id="logo">
	<div class="container">
		<a href="<?php echo esc_url(home_url()) ?>" title="<?php echo esc_attr(get_bloginfo('name').' - '.get_bloginfo('description')); ?>" id="logo-link">
			<?php if(function_exists('get_custom_header') && !empty(get_custom_header()->url)) : ?>
				<img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" title="<?php echo esc_attr(get_bloginfo('name')) ?>" alt="<?php echo esc_attr(get_bloginfo('name').' - '.get_bloginfo('description')) ?>" />
			<?php else : ?>
				<h1><?php echo esc_html(get_bloginfo('name')) ?></h1>
			<?php endif; ?>
		</a>
		
		<?php if(siteorigin_setting('general_search_input')) get_search_form() ?>
	</div>
</div>

<div id="mainmenu" class="<?php echo siteorigin_setting('general_scale_main_menu') ? 'scaled' : '' ?>">
	<div class="container">
		<?php
		wp_nav_menu(array(
			'theme_location' => 'main',
			'menu_id' => 'mainmenu-menu',
			'fallback_cb' => 'pitch_fallback_nav',
		));
		?>
	</div>
</div>