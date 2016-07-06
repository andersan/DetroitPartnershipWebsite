<?php get_header(); ?>

<?php
	$slider_template = apply_filters('pitch_slider_template', array('slider', null));	
	get_template_part( $slider_template[0], $slider_template[1] );
?>

<!-- implement a mobile specific slider?? -->

<?php if(siteorigin_setting('front_page_cta')) : ?>
	<div id="call-to-action">
		<div class="container">
			<h3><?php echo esc_html(siteorigin_setting('front_page_cta_text'), __('Enter Your Call To Action Text Here', 'pitch')) ?></h3>
			<?php if(siteorigin_setting('front_page_cta_button_url')) : ?>
				<a href="<?php echo esc_url(siteorigin_setting('front_page_cta_button_url')) ?>"><?php echo esc_html(siteorigin_setting('front_page_cta_button_text', __('Click Me', 'pitch'))) ?></a>
			<?php endif ?>
		</div>
	</div>
<?php endif ?>

<?php
if(siteorigin_setting('type_feature')){
	get_template_part('features');
}

/*if(wp_is_mobile()){
	// a description of dp programs, due to removal of program ads
	// no idea how to make this editable from the website... will need to create
	// a "siteorigin_setting('type_mobile_projects')"
	?> <h3>hey im going to put info about programs in the detroit area here --cree</h3> <?php
	$posts = array(
			'posts_per_page' => 10,
			'post_type' => 'project',
			'orderby' => 'menu_order',
			'all_link_url' => 'DESC',
		);
	
	echo $posts[0]. $posts[1];
	echo count($posts);
	foreach($posts as $x => $x_value) {
    echo "Key=" . $x . ", Value=" . $x_value;
    echo "<br>";
}

$query = new WP_Query($posts);

echo have_posts();
}*/

if(siteorigin_setting('type_project') /*&& !wp_is_mobile()*/){
	pitch_display_loop(
		siteorigin_setting('front_page_home_title_latest_projects', __('Latest Projects', 'pitch')),
		array(
			'posts_per_page' => 10,
			'post_type' => 'project',
			'orderby' => 'menu_order',
			'all_link_url' => 'DESC',
		),
		'home',
		get_post_type_archive_link('project')
	);
}

if(siteorigin_setting('front_page_home_blog')/* && !wp_is_mobile()*/){
	pitch_display_loop(
		siteorigin_setting('front_page_home_title_blog', __('From Our Blog', 'pitch')),
		array(
			'posts_per_page' => 10,
			'post_type' => 'post',
		),
		'home',
		get_post_type_archive_link('post')
	);
}

if(siteorigin_setting('type_client')){
	pitch_display_loop(
		siteorigin_setting('front_page_home_title_clients', __('Our Clients', 'pitch')),
		array(
			'posts_per_page' => 10,
			'post_type' => 'client',
			'orderby' => 'menu_order',
			'order' => 'ASC',
		),
		'home'
	);
}

get_footer(); ?>