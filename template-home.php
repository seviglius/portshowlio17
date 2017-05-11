<?php
/* Template Name:  Home */
?>

<?php get_header(); ?>

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

<div class="container">



</div>


<?php get_footer(); ?>
