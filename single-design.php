<?php get_header(); ?>

<div class="sidebar">

	<h2><?php the_title();?></h2>

	<?php the_field('headshot'); ?>

	<a href="http://<?php the_field('portfolio_site'); ?>"><?php the_field('portfolio_site'); ?></a>

	<!-- Insert Focus objects here -- you can see 2015 theme to write this if you'd like. or look at ACF website -->

	<!-- Insert social icons -- copy from 2016 single page -->

</div>


<?php if( have_rows('projects') ): ?>
	<?php while ( have_rows('projects') ) : the_row(); ?>
        
        <?php if( get_row_layout() == 'project' ): ?>

        		<h3><?php the_sub_field('project_title'); ?></h3>

				<!-- Figure out how to output project types with commas -->
        		<?php the_sub_field('project_type'); ?>	

        		
				<?php $post_objects = get_field('collaborators'); if( $post_objects ): ?>
					<?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
				        <?php setup_postdata($post); ?>
				        <a class="collaborators" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				    <?php endforeach; ?>
				    </p>
				    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
				<?php endif; ?>




				<?php the_sub_field('project_description'); ?>


				<?php if( have_rows('project_images') ): ?>
					<?php while ( have_rows('project_images') ) : the_row(); ?>
				        
				        <?php if( get_row_layout() == 'portrait_3_column' ): ?>
								


								<?php if( have_rows('images') ): ?>

								<?php  while( have_rows('images') ) : the_row(); ?>
								 
										
									   <?php $imageurl = get_sub_field('image'); ?>									

									    <img src="<?php echo $imageurl; ?>" /> 

										
								 
									<?php endwhile; ?>								 								
								 
								<?php endif; ?>


				
				        <?php elseif( get_row_layout() == 'portrait_2_column' ): ?>

				        	<?php if(get_sub_field('images')): ?>
								 
									<?php while(has_sub_field('images')): ?>
								 
										
										<?php
											$img = get_sub_field('image');
											$img_title = $img['title'];
											$img_alt = $img['alt'];
											$img_caption = $img['caption'];
											$img_desc = $img['description'];
											$img_url = $img['url'];
											$img_thumb = $img['sizes']['medium'];
										?>
										
										<img src="<?php echo $img_url; ?>" alt="<?php echo $img_alt; ?>" title="<?php echo $img_title; ?>">
										
								 
									<?php endwhile; ?>								 								
								 
								<?php endif; ?>

						
						<?php elseif( get_row_layout() == 'portrait_1_column' ): ?>

							<?php
								$img = get_sub_field('image');
								$img_title = $img['title'];
								$img_alt = $img['alt'];
								$img_caption = $img['caption'];
								$img_desc = $img['description'];
								$img_url = $img['url'];
								$img_thumb = $img['sizes']['medium'];
							?>
							
							<img src="<?php echo $img_url; ?>" alt="<?php echo $img_alt; ?>" title="<?php echo $img_title; ?>">


				        <?php elseif( get_row_layout() == 'landscape_image' ): ?>
				        	<?php
								$img = get_sub_field('image');
								$img_title = $img['title'];
								$img_alt = $img['alt'];
								$img_caption = $img['caption'];
								$img_desc = $img['description'];
								$img_url = $img['url'];
								$img_thumb = $img['sizes']['medium'];
							?>
							
							<img src="<?php echo $img_url; ?>" alt="<?php echo $img_alt; ?>" title="<?php echo $img_title; ?>">


				        <?php elseif( get_row_layout() == 'video' ): ?>]
				        	<?php the_sub_field('video'); ?>



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





<?php get_footer(); ?>