<div class="owl-test-area marginTop20">
<?php

$testimonial_args = ['post_type' => 'testimonial', 'posts_per_page' => -1, 'orderby' => 'id', 'order' => 'DESC'];

$testimonial = new WP_Query( $testimonial_args );  if($testimonial->have_posts()): 

?>		


<div id="owl-testimonial" class="">
<?php while ($testimonial->have_posts()): $testimonial->the_post() ?>          


	<div class="item thumbnail-area marginTop30 text-center">
		<div class="img-round">
	
	<?php if ( has_post_thumbnail() ):  ?><?php the_post_thumbnail('full', ['class'=>'img-responsive']) ?> <?php endif ?>
		  	
		</div>
	  		<blockquote>
			  <footer><?php the_title() ?><cite title="<?php the_title() ?>"></cite></footer>
			  <p>
				<?php the_content() ?>							 
			</blockquote>
	</div>

  <?php endwhile; wp_reset_postdata(); endif; ?>	

</div>
<!-- <div class="arow-bar-2"> -->
	<div class="customNavigation">
	  <a class="btn prev-test"><i class="fa fa-chevron-left"></i></a>
	  <a class="btn next-test"><i class="fa fa-chevron-right"></i></a>
	</div>
<!-- </div> -->
</div>
