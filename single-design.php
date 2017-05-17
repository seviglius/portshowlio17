<?php get_header(); ?>

<?php  function split_name($name) {
				$name = trim($name);
				$last_name = (strpos($name, ' ') === false) ? '' : preg_replace('#.*\s([\w-]*)$#', '$1', $name);
				$first_name = trim( preg_replace('#'.$last_name.'#', '', $name ) );
				return array($first_name, $last_name);
} ?>


<div class="studentPage">
<div class="sidebar">

    <div class='Logo'>
        <span class="icon-port-logo_black-nockout-ps-full"></span>
    </div>

    <div class='hr'></div>

	<div class='studentSidebar'>
		<span class='name'><?php echo split_name(get_the_title())[0]; ?></span>
		<span class='name'><?php echo split_name(get_the_title())[1]; ?></span>

		<img class='headshot' src='<?php the_field('headshot'); ?>' />

		<a class='website' href="http://<?php the_field('portfolio_site'); ?>"><?php the_field('portfolio_site'); ?></a>

		<!-- Insert Focus objects here -- you can see 2015 theme to write this if you'd like. or look at ACF website -->

		<?php $focus = get_field('focus');
			if( $focus ): ?>
			<?php foreach( $focus as $focus ): ?>
					<span class='focus'><?php echo $focus; ?></span>
			<?php endforeach; ?>
		<?php endif; ?>

		<!-- Insert social icons -- copy from 2016 single page -->

		<div class='socialSection'>
			<?php if( get_field('facebook_page') ): ?>
				<a class='socialIcon' href='<?php the_field('facebook_page')?>'><span class='icon-facebook'></span></a>
			<?php endif; ?>
			<?php if( get_field('linkedin_page') ): ?>
				<a class='socialIcon' href='<?php the_field('linkedin_page')?>'><span class='icon-linkedin'></span></a>
			<?php endif; ?>
			<?php if( get_field('twitter_page') ): ?>
				<a class='socialIcon' href='<?php the_field('twitter_page')?>'><span class='icon-twitter'></span></a>
			<?php endif; ?>
			<?php if( get_field('instagram_page') ): ?>
				<a class='socialIcon' href='<?php the_field('instagram_page')?>'><span class='icon-instagram'></span></a>
			<?php endif; ?>
			<?php if( get_field('tumblr_page') ): ?>
				<a class='socialIcon' href='<?php the_field('tumblr_page')?>'><span class='icon-tumblr'></span></a>
			<?php endif; ?>
			<?php if( get_field('pinterest_page') ): ?>
				<a class='socialIcon' href='<?php the_field('pinterest_page')?>'><span class='icon-pinterest'></span></a>
			<?php endif; ?>
			<?php if( get_field('youtube_page') ): ?>
				<a class='socialIcon' href='<?php the_field('youtube_page')?>'><span class='icon-youtube'></span></a>
			<?php endif; ?>
			<?php if( get_field('vimeo_page') ): ?>
				<a class='socialIcon' href='<?php the_field('vimeo_page')?>'><span class='icon-vimeo'></span></a>
			<?php endif; ?>
		</div>

	</div>

</div>


<div class="mainArea">

<div class="container">
	<div class="row">

				<?php if( have_rows('projects') ): ?>
					<?php while ( have_rows('projects') ) : the_row(); ?>
						<div class="col-xl-6 col-lg-8 col-md-12">
	        		<?php if( get_row_layout() == 'project' ): ?>

	        			<h3 class="projectTitle"><?php the_sub_field('project_title'); ?></h3>

								<!-- Figure out how to output project types with commas -->
	        			<p class="category"><?php the_sub_field('project_type'); ?></p>


								<?php $post_objects = get_field('collaborators'); if( $post_objects ): ?>
									<?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
					        	<?php setup_postdata($post); ?>
					        	<a class="collaborators" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					    		<?php endforeach; ?>
					    	</p>
					    	<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
							<?php endif; ?>


							<!--<hr>-->

							<p class="projectDescription"><?php the_sub_field('project_description'); ?></p>

						</div><!--col 6 close -->
						<div class="col-lg-12 col-md-0">
						</div>



						<?php if( have_rows('project_images') ): ?>
							<?php while ( have_rows('project_images') ) : the_row(); ?>

								<!--3 COLUMN PORTRAIT -->
				        <?php if( get_row_layout() == 'portrait_3_column' ): ?>

									<?php if( have_rows('images') ): ?>
										<?php  while( have_rows('images') ) : the_row(); ?>

										 <div class="col-md-4 imageGrid">
											 <?php $imageurl = get_sub_field('image'); ?>
									    	<img src="<?php echo $imageurl; ?>" />
											</div><!--col 4 close -->

										<?php endwhile; ?>
									<?php endif; ?>

								<!--2 COLUMN PORTRAIT -->
				        <?php elseif( get_row_layout() == 'portrait_2_column' ): ?>
				        	<?php if(get_sub_field('images')): ?>
										<?php while(has_sub_field('images')): ?>

											<?php /*
												$img = get_sub_field('image');
												$img_title = $img['title'];
												$img_alt = $img['alt'];
												$img_caption = $img['caption'];
												$img_desc = $img['description'];
												$img_url = $img['url'];
												$img_thumb = $img['sizes']['medium']; */
											?>

											<div class="col-md-6 imageGrid">
												<?php $imageurl = get_sub_field('image'); ?>
												<img src="<?php echo $imageurl; ?>" />
											</div>

										<?php endwhile; ?>
									<?php endif; ?>

								<!--1 COLUMN PORTRAIT -->
								<?php elseif( get_row_layout() == 'portrait_1_column' ): ?>

									<?php /*
										$img = get_sub_field('image');
										$img_title = $img['title'];
										$img_alt = $img['alt'];
										$img_caption = $img['caption'];
										$img_desc = $img['description'];
										$img_url = $img['url'];
										$img_thumb = $img['sizes']['medium'];*/
									?>
									<div class="col-md-3"></div>
									<div class="col-md-6 col-md-offset-3 imageGrid">
										<?php $imageurl = get_sub_field('image'); ?>
										<img src="<?php echo $imageurl; ?>" />
									</div>
									<div class="col-md-3"></div>

								<!--Landscape -->
				        <?php elseif( get_row_layout() == 'landscape_image' ): ?>
				        	<?php /*
										$img = get_sub_field('image');
										$img_title = $img['title'];
										$img_alt = $img['alt'];
										$img_caption = $img['caption'];
										$img_desc = $img['description'];
										$img_url = $img['url'];
										$img_thumb = $img['sizes']['medium']; */
									?>


						 		<div class="col-md-12 imageGrid">
									<?php $imageurl = get_sub_field('image'); ?>
									 <img src="<?php echo $imageurl; ?>" />
								 </div><!--col 12 close -->

								<!--Video -->
				        <?php elseif( get_row_layout() == 'video' ): ?>
									<div class="col-md-12 imageGrid video">
				        		<?php the_sub_field('video'); ?>

									</div>

				        <?php endif; ?>
				    	<?php endwhile; ?>

						<?php else : ?>
				   		<!-- nothing found -->
						<?php endif; ?>





        	<?php elseif( get_row_layout() == 'download' ): ?>

        	<?php endif; ?>
    		<?php endwhile; ?>

			<?php else : ?>
   		<!-- nothing found -->
			<?php endif; ?>

	</div>
</div>
</div>

<script>
	$(".studentSidebar").click(function() {
	if (	$(window).width() <= '768' &&  $('.sidebar').height() < 100) {
		$('.headshot').css('display','block');
		$('.website').css('display','block');
		$('.focus').css('display','block');
		$('.socialSection').css('display','block');
		$height = $('.socialSection').offset().top + $('.socialSection').height() + 50;
		$('.sidebar').animate( {
			height: $height
		},500);
	} else if ( 	$(window).width() <= '768' &&  $('.sidebar').height() >= 100 ) {
		$('.sidebar').animate( {
			height: 86
		},500, function() {
			$('.headshot').css('display','none');
			$('.website').css('display','none');
			$('.focus').css('display','none');
			$('.socialSection').css('display','none');
		});
	}
	})
</script>



<?php get_footer(); ?>
