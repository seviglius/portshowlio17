<?php
/* Template Name:  Home */
?>

<?php  function split_name($name) {
				$name = trim($name);
				$last_name = (strpos($name, ' ') === false) ? '' : preg_replace('#.*\s([\w-]*)$#', '$1', $name);
				$first_name = trim( preg_replace('#'.$last_name.'#', '', $name ) );
				return array($first_name, $last_name);
} ?>

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

    <span id='studentLink' class='filterMain'>
        <?php the_field('student_link'); ?>
    </span>
    <span id='workLink' class='filterMain'>
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
        <a class='socialIcon' href='https://www.facebook.com/events/214254915738545/' target='_blank'><span class='icon-facebook socialbox'></span></a>
        <a class='socialIcon' href='https://www.instagram.com/creative_academy/' target='_blank'><span class='icon-instagram socialbox'></span></a>
        <a class='socialIcon' href='https://twitter.com/SCCAportfolio' target='_blank'><span class='icon-twitter socialbox'></span></a>
    </div>



</div>

<div class="container mainArea workSection">

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
                    <a class='infoLink' href='<?php the_permalink() ?>'><div class='contentCenter'>
                        <?php if($i++ % 2): ?>
                            <img class='<?php echo str_replace(' ', '-', strtolower(get_the_title())); ?>' src='<?php the_field('featured_image_2x3')?>' />
                            <span class='name'><?php the_field('project_title_2x3') ?></span>
                            <span class='specalties'><?php the_field('project_type_2x3') ?></span>
                        <?php elseif ($i %3): ?>
                            <img class='<?php echo str_replace(' ', '-', strtolower(get_the_title())); ?>' src='<?php the_field('featured_image_4x3')?>' />
                            <span class='name'><?php the_field('project_title_4x3') ?></span>
                            <span class='specalties'><?php the_field('project_type_4x3') ?></span>
                        <?php else : ?>
                            <img class='<?php echo str_replace(' ', '-', strtolower(get_the_title())); ?>' src='<?php the_field('featured_image_3x4')?>' />
                            <span class='name'><?php the_field('project_title_3x4') ?></span>
                            <span class='specalties'><?php the_field('project_type_3x4') ?></span>
                        <?php endif; ?>


                        <!--a href="<?php the_permalink(); ?>"><img src="<?php the_field('featured_project_image'); ?>"></a>

                        <div class="scca-caption">
                           <h5><?php the_field('featured_project_name'); ?></h5>
                       </div--><!--scca-caption closes-->
                        <!--p class="scca-labels"><?php the_field('featured_project_type'); ?></p-->
                    </div> </a>

                </div><!--scca-homepage-item closes-->
        <?php wp_reset_query(); ?>

        <?php endwhile; ?>
        </div>
    <?php else : ?>
        Hello
    <?php endif; ?>



</div>


<div class="container mainArea studentSection">
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
                <div class="col-lg-4 col-md-12 scca-homepage-item">
                    <a class='infoLink' href='<?php the_permalink() ?>'>
						<div class='contentCenter'>
                            <img class='<?php echo str_replace(' ', '-', strtolower(get_field('project_title_2x3'))); ?><?php echo str_replace(' ', '-', strtolower(get_the_title())); ?>' src='<?php the_field('headshot')?>' />
                            <span class='name'><?php the_title() ?></span>
                            <span class='specalties'>
								<?php $focus = get_field('focus');
									if( $focus ): ?>
									<?php $f = 0 ?>
									<?php foreach( $focus as $focus ): ?>
											<?php echo $focus; ?>
											<?php if ($f++ == 2): ?>
											<?php else: ?> |
											<?php endif; ?>
									<?php endforeach; ?>
								<?php endif; ?>
							</span>
                    	</div>
					</a>

                </div><!--scca-homepage-item closes-->
        <?php wp_reset_query(); ?>

        <?php endwhile; ?>
        </div>
    <?php else : ?>
        Hello
    <?php endif; ?>
</div>

<div class="container mainArea eventSection">
    <div class='row aboutPage'>

        <p class="eventTitle"><?php the_field('scca'); ?></p>
        <p><?php the_field('presents'); ?></p>
        <p class="graduating"><?php the_field('graduating'); ?></p>
        <span class="eventDescription"><?php the_field('about_event'); ?></span>
        <p class="address"><?php the_field('address_line1'); ?></p>
        <p class="address"><?php the_field('address_line2'); ?></p>

        <?php if( have_rows('locations') ): ?>
            <div class="acf-map">
                <?php while ( have_rows('locations') ) : the_row();

                    $location = get_sub_field('location');

                    ?>
                    <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>">
                        <h4><?php the_sub_field('title'); ?></h4>
                        <p class="address"><?php echo $location['address']; ?></p>
                        <p><?php the_sub_field('description'); ?></p>
                    </div>
            <?php endwhile; ?>
            </div>
        <?php endif; ?>

        <span class="eventDescription"><?php the_field('directions'); ?></span>
        <p class="eventMap"><?php the_field('event_map'); ?></p>
        <p><?php the_field('floor'); ?></p>

        <?php

            $image = get_field('floor_map');

            if( !empty($image) ): ?>

                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

        <?php endif; ?>



    </div>
</div>

<!-- FILTERING SECTION -->

<div class='filterContainer'>

	<?php
        //remove_all_filters('posts_orderby');
        $args = array(
            'post_type' => array('design', 'photography'),
            'posts_per_page' => 1,
            'orderby'        => 'rand',
        );
        $query = new WP_Query($args);
        $featuredimage = get_field_objects();
    ?>

    <?php if( $query->have_posts() ): ?>
        <?php while ($query->have_posts()) : $query->the_post(); ?>

			<?php $field = get_field_object('focus');
			      $choices = $field['choices'];
				  ?>

			<?php foreach ($choices as $choice): ?>
				<div class='filterChoiceCont'>
					<span class='filterChoice <?php echo str_replace('/','_', str_replace(' ', '-', strtolower($choice))); ?>Button'>
						<?php echo $choice ?>
					</span>
				</div>
			<?php endforeach; ?>

        <?php wp_reset_query(); ?>

        <?php endwhile; ?>
    <?php else : ?>
    <?php endif; ?>

	<span class='filterButton'>FILTER</span>

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

				//THE WORK HOVER

                $(".<?php echo str_replace(' ', '-', strtolower(get_the_title())); ?>")
                .hover(function() {
                    console.log($(window).width(),$(window).height())
                    if( $(window).width() > 768 && $(window).height() > 650) {
                    $('.dates').clearQueue();
                    $('.sidebarTakeover').clearQueue();
                    $('.socialLinks').clearQueue();
                    $('.dates').css('display','none');
                    $('.socialLinks').css('display','none');

                    $('.dates').after("<div class='sidebarTakeover'><span class='takeoverName'><span class='name'><?php echo split_name(get_the_title())[0]; ?></span><span class='name'><?php echo split_name(get_the_title())[1]; ?></span></span><img src='<?php the_field('headshot') ?>' /></div>");
                    $('.sidebarTakeover').fadeIn();
                }
                },
                function() {
                    if( $(window).width() > 768 && $(window).height() > 650) {
                    $('.dates').clearQueue();
                    $('.sidebarTakeover').clearQueue();
                    $('.socialLinks').clearQueue();
                    $('.sidebarTakeover').fadeOut();
                    $('.dates').next().remove();
                    $('.dates').fadeIn(500,function() {
                        $('.dates').css('opacity',1);
                    });
                    $('.socialLinks').fadeIn(500,function() {
                        $('.socialLinks').css('opacity',1);
                    });
                    $('.dates').css('display','flex');
                }
                })

				//THE STUDENT HOVER

				$(".<?php echo str_replace(' ', '-', strtolower(get_field('project_title_2x3'))); ?><?php echo str_replace(' ', '-', strtolower(get_the_title())); ?>")
				.hover(function() {
					console.log($(window).width(),$(window).height())
					if( $(window).width() > 768 && $(window).height() > 650) {
					$('.dates').clearQueue();
					$('.sidebarTakeover').clearQueue();
					$('.socialLinks').clearQueue();
					$('.dates').css('display','none');
					$('.socialLinks').css('display','none');

					$('.dates').after("<div class='sidebarTakeover'><img class='<?php echo str_replace(' ', '-', strtolower(get_the_title())); ?>' src='<?php the_field('featured_image_4x3')?>' /><span class='name'><?php the_field('project_title_4x3') ?></span><span class='specalties'><?php the_field('project_type_4x3') ?></span></div>");
					$('.sidebarTakeover').fadeIn();
				}
				},
				function() {
					if( $(window).width() > 768 && $(window).height() > 650) {
					$('.dates').clearQueue();
					$('.sidebarTakeover').clearQueue();
					$('.socialLinks').clearQueue();
					$('.sidebarTakeover').fadeOut();
					$('.dates').next().remove();
					$('.dates').fadeIn(500,function() {
						$('.dates').css('opacity',1);
					});
					$('.socialLinks').fadeIn(500,function() {
						$('.socialLinks').css('opacity',1);
					});
					$('.dates').css('display','flex');
				}
				})

        <?php wp_reset_query(); ?>

        <?php endwhile; ?>
    <?php else : ?>
    <?php endif; ?>

	$('#studentLink').click(function() {
		$('.workSection').css('display','none');
		$('.studentSection').css('display','flex');
		$('.eventSection').css('display','none');
	})

	$('#workLink').click(function() {
		$('.workSection').css('display','flex');
		$('.studentSection').css('display','none');
		$('.eventSection').css('display','none');
	})


	$('.filterButton').click(function() {
		$('.filterChoice').css('display','inline-block');
	})

	<?php
        //remove_all_filters('posts_orderby');
        $args = array(
            'post_type' => array('design', 'photography'),
            'posts_per_page' => 1,
            'orderby'        => 'rand',
        );
        $query = new WP_Query($args);
        $featuredimage = get_field_objects();
    ?>

    <?php if( $query->have_posts() ): ?>
        <?php while ($query->have_posts()) : $query->the_post(); ?>

			<?php $field = get_field_object('focus');
			      $choices = $field['choices'];
				  ?>

			<?php foreach ($choices as $choice): ?>
				$('.<?php echo str_replace('/','_', str_replace(' ', '-', strtolower($choice))); ?>Button').click(function() {
					if($(this).data('selected') === 1 ){
						$(this).css('transform','none');
						$(this).css('background-color','black');
						$(this).data('selected', 0);
					} else {
						$(this).css('transform','rotateY(30deg) translateZ(10px)');
						$(this).css('background-color','orange');
						$(this).data('selected', 1);
					}
				})
			<?php endforeach; ?>

        <?php wp_reset_query(); ?>

        <?php endwhile; ?>
    <?php else : ?>
    <?php endif; ?>

</script>


<!--Google Maps-->

            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBmISmhav5F5sFCFpQF-1jM_MjkLpNxnoI"></script>

            <script type="text/javascript">
            (function($) {

            /*
            *  new_map
            *
            *  This function will render a Google Map onto the selected jQuery element
            *
            *  @type    function
            *  @date    8/11/2013
            *  @since   4.3.0
            *
            *  @param   $el (jQuery element)
            *  @return  n/a
            */

            function new_map( $el ) {

                // var
                var $markers = $el.find('.marker');


            /*Disables Scroll Wheel*/





            /*Google Maps Styling*/
            var styles = [
                    {
                        "featureType": "all",
                        "elementType": "labels",
                        "stylers": [
                            {
                                "visibility": "on"
                            }
                        ]
                    },
                    {
                        "featureType": "all",
                        "elementType": "labels.text",
                        "stylers": [
                            {
                                "visibility": "on"
                            }
                        ]
                    },
                    {
                        "featureType": "all",
                        "elementType": "labels.text.fill",
                        "stylers": [
                            {
                                "color": "#000000"
                            }
                        ]
                    },
                    {
                        "featureType": "all",
                        "elementType": "labels.text.stroke",
                        "stylers": [
                            {
                                "color": "#ffffff"
                            }
                        ]
                    },
                    {
                        "featureType": "all",
                        "elementType": "labels.icon",
                        "stylers": [
                            {
                                "visibility": "on"
                            }
                        ]
                    },
                    {
                        "featureType": "administrative",
                        "elementType": "all",
                        "stylers": [
                            {
                                "visibility": "on"
                            }
                        ]
                    },
                    {
                        "featureType": "administrative",
                        "elementType": "labels.text",
                        "stylers": [
                            {
                                "visibility": "on"
                            }
                        ]
                    },
                    {
                        "featureType": "landscape",
                        "elementType": "all",
                        "stylers": [
                            {
                                "color": "#ffffff"
                            }
                        ]
                    },
                    {
                        "featureType": "landscape.man_made",
                        "elementType": "labels.text",
                        "stylers": [
                            {
                                "visibility": "on"
                            }
                        ]
                    },
                    {
                        "featureType": "poi",
                        "elementType": "all",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "poi",
                        "elementType": "labels.text",
                        "stylers": [
                            {
                                "visibility": "on"
                            }
                        ]
                    },
                    {
                        "featureType": "poi",
                        "elementType": "labels.text.fill",
                        "stylers": [
                            {
                                "visibility": "on"
                            }
                        ]
                    },
                    {
                        "featureType": "poi.school",
                        "elementType": "labels.text",
                        "stylers": [
                            {
                                "visibility": "simplified"
                            }
                        ]
                    },
                    {
                        "featureType": "poi.school",
                        "elementType": "labels.text.fill",
                        "stylers": [
                            {
                                "visibility": "on"
                            },
                            {
                                "hue": "#aa00ff"
                            }
                        ]
                    },
                    {
                        "featureType": "road",
                        "elementType": "geometry.fill",
                        "stylers": [
                            {
                                "color": "#000000"
                            },
                            {
                                "weight": 1
                            }
                        ]
                    },
                    {
                        "featureType": "road",
                        "elementType": "geometry.stroke",
                        "stylers": [
                            {
                                "color": "#000000"
                            },
                            {
                                "weight": 0.8
                            }
                        ]
                    },
                    {
                        "featureType": "road",
                        "elementType": "labels",
                        "stylers": [
                            {
                                "visibility": "on"
                            }
                        ]
                    },
                    {
                        "featureType": "transit",
                        "elementType": "all",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "water",
                        "elementType": "all",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    }
                ]

                // vars
                var args = {
                    zoom        : 16,
                    center      : new google.maps.LatLng(0, 0),
                    mapTypeId   : google.maps.MapTypeId.ROADMAP,
                    styles :  styles
                };


                // create map
                var map = new google.maps.Map( $el[0], args);



                // add a markers reference
                map.markers = [];


                // add markers
                $markers.each(function(){

                    add_marker( $(this), map );

                });


                // center map
                center_map( map );


                // return
                return map;

            }

            /*
            *  add_marker
            *
            *  This function will add a marker to the selected Google Map
            *
            *  @type    function
            *  @date    8/11/2013
            *  @since   4.3.0
            *
            *  @param   $marker (jQuery element)
            *  @param   map (Google Map object)
            *  @return  n/a
            */

            function add_marker( $marker, map ) {

                // var
                var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

                // create marker
                var marker = new google.maps.Marker({
                    position    : latlng,
                    map         : map
                });

                // add to array
                map.markers.push( marker );

                // if marker contains HTML, add it to an infoWindow
                if( $marker.html() )
                {
                    // create info window
                    var infowindow = new google.maps.InfoWindow({
                        content     : $marker.html()
                    });

                    // show info window when marker is clicked
                    google.maps.event.addListener(marker, 'click', function() {

                        infowindow.open( map, marker );

                    });
                }

            }

            /*
            *  center_map
            *
            *  This function will center the map, showing all markers attached to this map
            *
            *  @type    function
            *  @date    8/11/2013
            *  @since   4.3.0
            *
            *  @param   map (Google Map object)
            *  @return  n/a
            */

            function center_map( map ) {

                // vars
                var bounds = new google.maps.LatLngBounds();

                // loop through all markers and create bounds
                $.each( map.markers, function( i, marker ){

                    var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

                    bounds.extend( latlng );

                });

                // only 1 marker?
                if( map.markers.length == 1 )
                {
                    // set center of map
                    map.setCenter( bounds.getCenter() );
                    map.setZoom( 16 );
                }
                else
                {
                    // fit to bounds
                    map.fitBounds( bounds );
                }

            }

            /*
            *  document ready
            *
            *  This function will render each map when the document is ready (page has loaded)
            *
            *  @type    function
            *  @date    8/11/2013
            *  @since   5.0.0
            *
            *  @param   n/a
            *  @return  n/a
            */
            // global var
            var map = null;

            $(document).ready(function(){

                $('.acf-map').each(function(){

                    // create map
                    map = new_map( $(this) );

                });

            });

			$('.eventLink').click(function() {
				$('.workSection').css('display','none');
				$('.studentSection').css('display','none');
				$('.eventSection').css('display','flex');
				google.maps.event.trigger(map, 'resize');
			})


            })(jQuery);
            </script>



<?php get_footer(); ?>
