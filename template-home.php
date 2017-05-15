<?php
/* Template Name:  Home */
?>

<?php get_header(); ?>
<div class='homePage'>
<div class="sidebar">

    <div class='Logo'>
        <span class="icon-port-logo_black-nockout-ps-full"></span>
    </div>

    <div class='hr'></div>

    <span id='workLink' class='filterMain'>
        <?php the_field('student_link'); ?>
    </span>
    <span id='studentLink' class='filterMain'>
        <?php the_field('work_link'); ?>
    </span>

    <div class='hr'></div>

    <div class='dates'>
        <?php if( have_rows('info') ): ?>
            <?php while ( have_rows('info') ) : the_row(); ?>
                <?php if( get_row_layout() == 'night_details' ): ?>
                    <div class='oneNight'>
                        <span class='nightType'>
                            <?php the_sub_field('night_type'); ?>
                        </span>
                        <span class='date'>
                            <?php the_sub_field('date'); ?>
                        </span>
                        <span class='time'>
                            <?php the_sub_field('time'); ?>
                        </span>
                    </div>
                <?php elseif( get_row_layout() == 'download' ): ?>
                <?php endif; ?>
            <?php endwhile; ?>
        <?php else : ?>
           <!-- nothing found -->
        <?php endif; ?>

        <span class='eventLink'>Event Details<span class='icon-arrow'></span></span>

    </div>

    <div class='hr'></div>

    <div class='socialLinks'>
        <span class='icon-facebook socialbox'></span>
        <span class='icon-instagram socialbox'></span>
        <span class='icon-twitter socialbox'></span>
    </div>



</div>

<div class="container mainArea">

    <?php
        //remove_all_filters('posts_orderby');
        $args = array(
            'post_type' => array('design', 'photography'),
            'posts_per_page' => 100,
            'orderby'        => 'rand',
        );
        $query = new WP_Query($args);
        $featuredimage = get_field_objects();
    ?>


    <?php if( $query->have_posts() ): ?>
        <div class='row'>
        <?php while ($query->have_posts()) : $query->the_post(); ?>
                <div class="col-sm-4 col-xs-6 scca-homepage-item">

                    <img src='https://placeholdit.imgix.net/~text?txtsize=19&txt=200%C3%97200&w=200&h=200' />

                    <a href="<?php the_permalink(); ?>"><img src="<?php the_field('featured_project_image'); ?>"></a>

                        <div class="scca-caption">
                           <h5><?php the_field('featured_project_name'); ?></h5>
                        </div><!--scca-caption closes-->
                        <p class="scca-labels"><?php the_field('featured_project_type'); ?></p>

                </div><!--scca-homepage-item closes-->
        <?php wp_reset_query(); ?>

        <?php endwhile; ?>
        </div>
    <?php else : ?>
        Hello
    <?php endif; ?>



</div>
</div>

<?php get_footer(); ?>
