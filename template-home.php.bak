<?php
/* Template Name:  Home */
?>

<?php get_header(); ?>
<div class='homePage'>
<div class="sidebar">

    <div id='logoBig' class='Logo'>
        <a href="/" class="logolink"><span class="icon-port-logo_black-nockout-ps-full"></span></a>
    </div>
    <div id='logoSmall' class='Logo'>
        <a href="/" class="logolink"><span class="icon-logo_med">
        </span></a>
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
        <?php $i = 0 ?>
        <div class='row'>
        <?php while ($query->have_posts()) : $query->the_post(); ?>
                <div class="col-lg-4 col-md-12 scca-homepage-item">
                    <div class='contentCenter'>
                        <?php if($i++ % 2): ?>
                            <img class='<?php echo str_replace(' ', '-', strtolower(get_the_title())); ?>' src='https://placeholdit.imgix.net/~text?txtsize=85&txt=1024%C3%97768&w=1024&h=768' />
                        <?php elseif ($i %3): ?>
                            <img class='<?php echo str_replace(' ', '-', strtolower(get_the_title())); ?>' src='https://placeholdit.imgix.net/~text?txtsize=77&txt=1024%C3%971365&w=1024&h=1365' />
                        <?php else : ?>
                            <img class='<?php echo str_replace(' ', '-', strtolower(get_the_title())); ?>' src='https://placeholdit.imgix.net/~text?txtsize=77&txt=1024%C3%971536&w=1024&h=1536' />
                        <?php endif; ?>
                        <span class='name'>BADASS PROJECT</span>
                        <span class='specalties'>UX | MEOW | INTERACTIVE</span>

                        <!--a href="<?php the_permalink(); ?>"><img src="<?php the_field('featured_project_image'); ?>"></a>

                        <div class="scca-caption">
                           <h5><?php the_field('featured_project_name'); ?></h5>
                       </div--><!--scca-caption closes-->
                        <!--p class="scca-labels"><?php the_field('featured_project_type'); ?></p-->
                    </div>

                </div><!--scca-homepage-item closes-->
        <?php wp_reset_query(); ?>

        <?php endwhile; ?>
        </div>
    <?php else : ?>
        Hello
    <?php endif; ?>



</div>
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
