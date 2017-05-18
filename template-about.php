<?php
/* Template Name:  About */
?>

<?php get_header(); ?>


<div class="sidebar">

    <div class='Logo'>
        <a href="/"><span class="icon-port-logo_black-nockout-ps-full"></span></a>
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
</div>

<script>
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
        <?php while ($query->have_posts()) : $query->the_post(); ?>

            //DO MY STUFF HERE

            $(".<?php echo str_replace(' ', '-', strtolower(get_the_title())); ?>")
            .hover(function() {
                $('.dates').clearQueue();
                $('.sidebarTakeover').clearQueue();
                $('.dates').css('display','none');

                $('.dates').after("<div class='sidebarTakeover'><?php the_title() ?></div>");
                $('.sidebarTakeover').fadeIn();
            },
            function() {
                $('.dates').clearQueue();
                $('.sidebarTakeover').clearQueue();
                $('.sidebarTakeover').fadeOut();
                $('.dates').next().remove();
                $('.dates').fadeIn();
                $('.dates').css('display','flex');
            })

        <?php wp_reset_query(); ?>

        <?php endwhile; ?>
    <?php else : ?>
    <?php endif; ?>
</script>

<?php get_footer(); ?>
