<?php

$slides = new WP_Query(array(
	'numberposts' => siteorigin_setting('slider_max_slides'),
	'nopaging'     => true,
	'post_type' => 'slide',
	'orderby' => 'menu_order',
	'order' => 'ASC'
));


$post_count = $slides->found_posts;

if($slides->have_posts()){
	?>
	<div class="container" style="margin-bottom: 50px;">
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
		  <ol class="carousel-indicators">

		  	<!-- TODO: DYNAMIC NUMBER OF INDICATORS DEPENDING ON # OF SLIDES -->
		    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
		    <?php for ($ind = 1; $ind < $post_count; $ind++) {echo '
		    <li data-target="#carousel-example-generic" data-slide-to="'.$ind.'"></li>';} ?>
		    </ol>

		  <!-- Wrapper for slides -->

		<div class="carousel-inner" role="listbox" style="">

			<!-- cycle through posts -->
			<?php while ($slides->have_posts()) : $slides->the_post(); if(has_post_thumbnail()) :  ?>
			
				<div class="item <?php if($slides->current_post == 0) echo 'active' ?>">

				<!-- print post image -->
					<!--<img src="http://blogs-images.forbes.com/chriswright/files/2014/12/spain.png" alt="">-->
					<?php if(get_post_meta(get_the_ID(), 'slide_destination', true)) : $destination = get_post_meta(get_the_ID(), 'slide_destination', true) ?>
						<?php echo '<a href="'.esc_url(get_permalink($destination)).'" title="'.esc_attr(get_the_title($destination)).'">' ?>
					<?php elseif(get_post_meta(get_the_ID(), 'slide_destination_url', true)) : $destination = get_post_meta(get_the_ID(), 'slide_destination_url', true) ?>
						<?php echo '<a href="'.esc_url($destination).'">' ?>
					<?php endif; ?>
					<?php echo get_the_post_thumbnail(get_the_ID(), 'img-responsive center-block' /* the image is responsive, but still can have very variable heights... */) ?>
					<?php if(!empty($destination)) echo '</a>' ?>

		      <div class="carousel-caption" style="" >
		        <!-- print post title -->
						<h3><?php the_title() ?></h3> 
		        <p>
							<?php the_excerpt() ?>
		        </p>
		      </br>
		        <button class="btn"><a href=<?php echo $destination ?>>Learn more</a></button>
		      </div>
		    </div>

		  <?php endif; endwhile; ?>
		</div>



			<!-- Controls -->
		  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
		    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		    <span class="sr-only">Previous</span>
		  </a>
		  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
		    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		    <span class="sr-only">Next</span>
		  </a>
		</div>
	</div>
		

	<?php
	wp_reset_postdata();
}
else{
	get_template_part('demo/slider');
}