<?php
/* Template Name:  Home */
?>

<?php  function split_name($name) {
				$name = trim($name);
				$last_name = (strpos($name, ' ') === false) ? '' : preg_replace('#.*\s([\w-]*)$#', '$1', $name);
				$first_name = trim( preg_replace('#'.$last_name.'#', '', $name ) );
				return array($first_name, $last_name);
} ?>

<?php  function removeBadStuff($object) {
				return str_replace(",", "",str_replace(".", "",str_replace(":", "",str_replace("&", "",str_replace("+", "",str_replace("'", "",str_replace('/','_', str_replace(' ', '-', strtolower($object)))))))));
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


    <div class="workstudents">
		<span id='workLink' class='filterMain'>
            <?php the_field('work_link'); ?>
        </span>
        <span id='studentLink' class='filterMain'>
            <?php the_field('student_link'); ?>
        </span>

    </div>


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

		<span class='eventLink showMobile'><span class='icon-info'></span></span>
        <span class='eventLink hideMobile'>Event Details<span class='icon-arrow'></span></span>

    </div>

    <div class='hr'></div>

    <div class='socialLinks'>
        <a class='socialIcon' href='https://www.facebook.com/events/214254915738545/' target='_blank'><span class='icon-facebook socialbox'></span></a>
        <a class='socialIcon' href='https://www.instagram.com/creative_academy/' target='_blank'><span class='icon-instagram socialbox'></span></a>
        <a class='socialIcon' href='https://twitter.com/SCCAportfolio' target='_blank'><span class='icon-twitter socialbox'></span></a>
    </div>



</div>

<div class="container mainArea workSection">
	<div class='row'>
	<div class='col-md-12'>
		<a target='_blank' href='<?php the_field('videolink') ?>'>
		<img src='<?php the_field('360_video'); ?>'>
	</a>
	</div>
</div>
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
        <div class='row grid'>
        <?php while ($query->have_posts()) : $query->the_post(); ?>


						<?php $i++ ?>
                        <?php if($i % 2): ?>
							<div class="col-lg-4 col-md-12 scca-homepage-item project <?php  echo get_post_type() ?> <?php echo removeBadStuff(get_field('project_type_2x3')) ?>" >
								<a class='infoLink' href='<?php the_permalink() ?>'><div class='contentCenter'>
		                            <img class='<?php echo removeBadStuff(get_the_title()); ?>Project' src='<?php the_field('featured_image_2x3')?>' />
		                            <span class='name'><?php the_field('project_title_2x3') ?></span>
		                            <span class='specalties'><?php the_field('project_type_2x3') ?></span>
								</div> </a>
							</div>
						<?php elseif ($i %3): ?>
							<div class="col-lg-4 col-md-12 scca-homepage-item project <?php echo get_post_type() ?> <?php echo removeBadStuff(get_field('project_type_4x3')) ?>">
								<a class='infoLink' href='<?php the_permalink() ?>'><div class='contentCenter'>
									<?php $i=0 ?>
		                            <img class='<?php echo removeBadStuff(get_the_title()); ?>Project' src='<?php the_field('featured_image_4x3')?>' />
		                            <span class='name'><?php the_field('project_title_4x3') ?></span>
		                            <span class='specalties'><?php the_field('project_type_4x3') ?></span>
								</div> </a>
							</div>
                        <?php else : ?>
							<div class="col-lg-4 col-md-12 scca-homepage-item project <?php echo get_post_type() ?> <?php echo removeBadStuff(get_field('project_type_3x4'))?>">
								<a class='infoLink' href='<?php the_permalink() ?>'><div class='contentCenter'>
		                            <img class=' <?php echo removeBadStuff(get_the_title()); ?>Project' src='<?php the_field('featured_image_3x4')?>' />
		                            <span class='name'><?php the_field('project_title_3x4') ?></span>
		                            <span class='specalties'><?php the_field('project_type_3x4') ?></span>
								</div> </a>
							</div>
                        <?php endif; ?>

        <?php wp_reset_query(); ?>

        <?php endwhile; ?>
        </div>
    <?php else : ?>
        Hello
    <?php endif; ?>



</div>


<div class="container mainArea studentSection">
	<div class='row'>
	<div class='col-md-12'>
		<a target='_blank' href='<?php the_field('videolink') ?>'>
		<img src='<?php the_field('360_video'); ?>'>
	</a>
	</div>
</div>
	<?php
        //remove_all_filters('posts_orderby');
        $args = array(
            'post_type' => array('design', 'photography'),
            'posts_per_page' => 100,
            'orderby'        => 'title',
        );
        $query = new WP_Query($args);
        $featuredimage = get_field_objects();
    ?>


    <?php if( $query->have_posts() ): ?>
        <div class='row grid'>
        <?php while ($query->have_posts()) : $query->the_post(); ?>
                <div class="col-lg-4 col-md-12 scca-homepage-item project <?php echo get_post_type() ?>
				<?php $focus = get_field('focus');
					if( $focus ): ?>
					<?php foreach( $focus as $focus ): ?>
							<?php echo removeBadStuff($focus); ?>
					<?php endforeach; ?>
				<?php endif; ?>
				">
                    <a class='infoLink' href='<?php the_permalink() ?>'>
						<div class='contentCenter'>
                            <img class='<?php echo removeBadStuff(get_field('project_title_2x3')); ?><?php echo removeBadStuff(get_the_title()); ?>Person' src='<?php the_field('headshot')?>' />
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

        <span class='closePage'><span class='icon-x'></span></span>





        <p class="eventTitle"><?php the_field('scca'); ?></p>
        <p><?php the_field('presents'); ?></p>
        <p class="graduating"><?php the_field('graduating'); ?></p>
        <span class="eventDescription"><?php the_field('about_event'); ?></span>


        <!--Show dates for mobile-->
        <div class='mobilehr'></div>
        <div class='mobileDates'>
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
    	</div>
    	<div class='mobilehr' style="margin-bottom: 6em;"></div>


        <p class="address"><?php the_field('address_line1'); ?></p>
        <p class="address"><?php the_field('address_line2'); ?></p>

        <?php if( have_rows('locations') ): ?>
			<span class='clickDetect'>
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
		</span>
        <?php endif; ?>

        <span class="directions"><?php the_field('directions'); ?></span>
        <a target='_blank' href='https://www.google.com/maps/place/Seattle+Central+College/@47.6162684,-122.3237729,17z/data=!3m1!4b1!4m5!3m4!1s0x54906accc351c149:0xdc1a5c338dd4395c!8m2!3d47.6162684!4d-122.3215842' class="getDirections">Get Directions</a>
        <p class="eventMap"><?php the_field('event_map'); ?></p>
        <p><?php the_field('floor'); ?></p>

        <?php

            $image = get_field('floor_map');

            if( !empty($image) ): ?>

                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

        <?php endif; ?>

        <div class="container">
            <div class="col-lg-4 floorArea">
                <p><span class="bignumber" >1</span>Students</p>
            </div>
            <div class="col-lg-4 floorArea">
                <p><span class="bignumber" >2</span>Gallery</p>
            </div>
            <div class="col-lg-4 floorArea">
                <p><span class="bignumber" >3</span>Video | VR</p>
            </div>
        </div>



    </div>
</div>

<!-- FILTERING SECTION -->

<div class='filterContainer'>



	<span class='designButtonFilters'>
	<?php
        //remove_all_filters('posts_orderby');
        $args = array(
            'post_type' => 'design',
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
					<span class='filterChoice <?php echo removeBadStuff($choice); ?>Button'>
						<?php echo $choice ?>
					</span>
				</div>
			<?php endforeach; ?>

        <?php wp_reset_query(); ?>

        <?php endwhile; ?>
    <?php else : ?>
    <?php endif; ?>
</span>


	<span class='photoButtonFilters'>
	<?php
        //remove_all_filters('posts_orderby');
        $argsPhoto = array(
            'post_type' => 'photography',
            'posts_per_page' => 1,
            'orderby'        => 'rand',
        );
        $queryphoto = new WP_Query($argsPhoto);
        $featuredimage = get_field_objects();
    ?>

    <?php if( $queryphoto->have_posts() ): ?>
        <?php while ($queryphoto->have_posts()) : $queryphoto->the_post(); ?>

			<?php $field = get_field_object('focus');
			      $choices = $field['choices'];
				  ?>

			<?php foreach ($choices as $choice): ?>
				<div class='filterChoiceCont'>
					<span class='filterChoice <?php echo removeBadStuff($choice); ?>Button'>
						<?php echo $choice ?>
					</span>
				</div>
			<?php endforeach; ?>

        <?php wp_reset_query(); ?>

        <?php endwhile; ?>
    <?php else : ?>
    <?php endif; ?>
</span>

<div class='mainFilters'>
	<div class='filterChoiceCont'>
		<span class='filterChoiceMain designButton'>
			Design
		</span>
	</div>

	<div class='filterChoiceCont'>
		<span class='filterChoiceMain photoButton'>
			Photography
		</span>
	</div>
	<span class='search'><input type="text" class="quicksearch" placeholder="Search" /></span>
	<span class='searchButton'><span class='icon-search'></span></span>
	<span class='filterButton'>FILTER</span>
</div>




</div>

</div>

<script>

	Isotope.Item.prototype._create = function() {
	  // assign id, used for original-order sorting
	  this.id = this.layout.itemGUID++;
	  // transition objects
	  this._transn = {
		ingProperties: {},
		clean: {},
		onEnd: {}
	  };
	  this.sortData = {};
	};

	Isotope.Item.prototype.layoutPosition = function() {
	  this.emitEvent( 'layout', [ this ] );
	};

	Isotope.prototype.arrange = function( opts ) {
	  // set any options pass
	  this.option( opts );
	  this._getIsInstant();
	  // just filter
	  this.filteredItems = this._filter( this.items );
	  // flag for initalized
	  this._isLayoutInited = true;
	};

	// layout mode that does not position items
	Isotope.LayoutMode.create('none');

	$('.filterButton').css('opacity','.1');

	//$('.mainArea').imagesLoaded(function() {


	$('.filterButton').css('opacity','1');
	$('.filterButton').click(function() {
		if($('.search').css('display') === 'inline-block') {
			$('.search').css('display','none')
			$filters = [];
			var $filtersJoin = $filters.join(', ');
			$grid.isotope({ filter: $filtersJoin });
		}
		if($('.filterChoiceMain').css('display') === 'inline-block') {



			$('.filterChoiceMain').css('display','none');

			$('.designButtonFilters').css('display','none');


			$('.photoButtonFilters').css('display','none');

		} else {

			if ( $('.photoButton').data('selected') === 1) {
				$('.photoButtonFilters').css('display','inline-block');
				$('.mainArea').each( function() {
					if( $(this).css('display') === 'flex' ) {
						width = $(this).outerWidth();
					}
				})
				$('.photoButtonFilters').css('width',width);
			}
			if ( $('.designButton').data('selected') === 1) {
				$('.designButtonFilters').css('display','inline-block');
				$('.mainArea').each( function() {
					if( $(this).css('display') === 'flex' ) {
						width = $(this).outerWidth();
					}
				})
				$('.designButtonFilters').css('width',width);
			}

				$('.filterChoiceMain').css('display','inline-block');
		}


	})

	$('.searchButton').click(function() {
		console.log('searchClicked');
		if($('.filterChoiceMain').css('display') === 'inline-block') {
			$('.filterChoiceMain').css('display','none');
			$('.designButtonFilters').css('display','none');
			$('.photoButtonFilters').css('display','none');
			$filters = [];
			var $filtersJoin = $filters.join(', ');
			$grid.isotope({ filter: $filtersJoin });
		}
		if ($('.search').css('display') === 'inline-block'){
			$('.search').css('display','none')
			$filters = [];
			var $filtersJoin = $filters.join(', ');
			$grid.isotope({ filter: $filtersJoin });
		} else {
			$('.filterChoiceMain').css('transform','none');
			$('.filterChoiceMain').css('background-color','black');
			$('.filterChoiceMain').data('selected', 0);
			$('.filterChoice').css('transform','none');
			$('.filterChoice').css('background-color','black');
			$('.filterChoice').data('selected', 0);

			$('.search').css('display','inline-block');
			$filters = [];
			var $filtersJoin = $filters.join(', ');
			$grid.isotope({ filter: $filtersJoin });
		}


	})

	var $filters = []
	// quick search regex
	var qsRegex;

	var $grid = $('.grid').isotope({
	  // options
	  itemSelector: '.project',
	  transitionDuration: 0,
	  layoutMode: 'none'
	  /*hiddenStyle: {
		  display: 'none',
		  position: 'initial',
		  left:'auto',
		  right:'auto'
	  },
	  visibleStyle: {
		  display: 'flex',
		  position: 'initial',
		  width:'100px',
		  left:'0px',
		  right:'0px'
	  }*/
	});

	// use value of search field to filter
	var $quicksearch = $('.quicksearch').keyup( debounce( function() {
		//console.log($quicksearch.val());
		if($quicksearch.val()==='I am Blue') {
			console.log('hax');
			$('.sidebar').css('background','blue');
			$('.sidebar').css('color','white');
		}
		if($quicksearch.val()==='screensaver') {
			console.log('hax2');
			$('.icon-port-logo_black-nockout-ps-full').css('position','absolute');

			var leftMult = 1
			var topMult = 1
			var stepSize = 2;
			var leftSize = $('.icon-port-logo_black-nockout-ps-full').width();
			var topSize = $('.icon-port-logo_black-nockout-ps-full').height();
			var refreshRate = 10;

			setInterval(function() {

			  var topPos=$('.icon-port-logo_black-nockout-ps-full').position().top;
			  var leftPos=$('.icon-port-logo_black-nockout-ps-full').position().left;

			  var newLeft= leftPos + leftMult*stepSize;
			  var newTop= topPos + topMult*stepSize;
			  if(newLeft+leftSize > $( window ).width()) {leftMult = -1;backgroundYellow();}
			  if(newTop+topSize> $( window ).height()) {topMult = -1;backgroundBlue();}
			  if(newLeft < 0) {leftMult = 1;backgroundOrange();}
			  if(newTop < 0) {topMult = 1;backgroundWhite();}
			  console.log(newLeft,$( window ).width(),newTop,$( window ).height());

			  $('.icon-port-logo_black-nockout-ps-full').css('top',''+newTop+'px');
			  $('.icon-port-logo_black-nockout-ps-full').css('left',''+newLeft+'px');
			},refreshRate)
		}
	  qsRegex = new RegExp( $quicksearch.val(), 'gi' );
	  //console.log('keyup');
  	$grid.isotope({ filter: function() {
  			return qsRegex ? $(this).text().match( qsRegex ) : true;
		} });
	}, 200 ) );

	// debounce so filtering doesn't happen every millisecond
	function debounce( fn, threshold ) {
	  var timeout;
	  return function debounced() {
	    if ( timeout ) {
	      clearTimeout( timeout );
	    }
	    function delayed() {
	      fn();
	      timeout = null;
	    }
	    timeout = setTimeout( delayed, threshold || 100 );
	  }
	}


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

                $(".<?php echo removeBadStuff(get_the_title()); ?>Project")
                .hover(function() {
                    console.log($(window).width(),$(window).height())
                    if( $(window).width() > 768 && $(window).height() > 650) {
                    $('.dates').clearQueue();
                    $('.sidebarTakeover').clearQueue();
                    $('.socialLinks').clearQueue();
                    $('.dates').css('display','none');
                    $('.socialLinks').css('display','none');

                    $('.dates').after("<div class='sidebarTakeover'><span class='takeoverName'><span class='name'><?php echo split_name(get_the_title())[0]; ?></span><span class='name'><?php echo split_name(get_the_title())[1]; ?></span></span><img class='headshot' src='<?php the_field('headshot') ?>' /></div>");
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

				$(".<?php echo removeBadStuff(get_field('project_title_2x3')); ?><?php echo removeBadStuff(get_the_title()); ?>Person")
				.hover(function() {
					console.log($(window).width(),$(window).height())
					if( $(window).width() > 768 && $(window).height() > 650) {
					$('.dates').clearQueue();
					$('.sidebarTakeover').clearQueue();
					$('.socialLinks').clearQueue();
					$('.dates').css('display','none');
					$('.socialLinks').css('display','none');

					$('.dates').after("<div class='sidebarTakeover'><img class='<?php echo removeBadStuff(get_the_title()); ?>' src='<?php the_field('featured_image_4x3')?>' /><span class='projectName'><?php the_field('project_title_4x3') ?></span><span class='specialties'><?php the_field('project_type_4x3') ?></span></div>");
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
		$('.studentSection').css('display','block');
		$('.eventSection').css('display','none');
		$('.filterContainer').css('display','initial');
		$('.sidebar').removeClass('sidebarBlackout');
		$('body').css('background','white');

		$('#workLink').css('cursor','pointer');
		$('#studentLink').css('cursor','default');

		$('#studentLink').css('color','#999999');
		$('#workLink').css('color','black');

		var $filtersJoin = $filters.join(', ');
		$grid.isotope({ filter: $filtersJoin });
	})

	$('#workLink').click(function() {
		$('#studentLink').css('cursor','pointer');
		$('#workLink').css('cursor','default');

		$('#workLink').css('color','#999999');
		$('#studentLink').css('color','black');

		$('.workSection').css('display','block');
		$('.studentSection').css('display','none');
		$('.eventSection').css('display','none');
		$('.filterContainer').css('display','initial');
		$('.sidebar').removeClass('sidebarBlackout');
		$('body').css('background','white');

		var $filtersJoin = $filters.join(', ');
		$grid.isotope({ filter: $filtersJoin });
	})

	$('.closePage').click(function() {
		$('#workLink').css('color','#999999');
		$('#studentLink').css('color','black');
		$('.workSection').css('display','block');
		$('.eventSection').css('display','none');
		$('.filterContainer').css('display','initial');
		$('.sidebar').removeClass('sidebarBlackout');
		$('body').css('background','white');
	})


	$('.photoButton').click(function() {
		if($('.search').css('display') === 'inline-block') {
			$('.search').css('display','none')
		}
		if($('.designButtonFilters').css('display') === 'inline-block') {
			$('.filterChoice').css('transform','none');
			$('.filterChoice').css('background-color','black');
			$('.filterChoice').data('selected', 0);
			$('.designButton').data('selected', 0);

			$('.designButtonFilters').css('display','none');
			$('.designButton').css('transform','none');
			$('.designButton').css('background-color','black');
			var index = $filters.indexOf('.design');
			if (index > -1) {
				$filters.splice(index, 1);
			}
			var $filtersJoin = $filters.join(', ');
			$grid.isotope({ filter: $filtersJoin });

		}
		if($('.photoButtonFilters').css('display') === 'inline-block') {
			$('.filterChoice').css('transform','none');
			$('.filterChoice').css('background-color','black');
			$('.filterChoice').data('selected', 0);
			$(this).data('selected', 0);

			$('.photoButtonFilters').css('display','none');
			$(this).css('transform','none');
			$(this).css('background-color','black');
			var index = $filters.indexOf('.photography');
			if (index > -1) {
				$filters.splice(index, 1);
			}
			var $filtersJoin = $filters.join(', ');
			$grid.isotope({ filter: $filtersJoin });
		} else {

				$('.filterChoice').css('transform','none');
				$('.filterChoice').css('background-color','black');
				$('.filterChoice').data('selected', 0);
				$(this).data('selected', 1);

				$('.photoButtonFilters').css('display','inline-block');
				$('.mainArea').each( function() {
					if( $(this).css('display') === 'flex' ) {
						width = $(this).outerWidth();
					}
				})
				console.log(width);
				$(this).css('transform','rotateY(30deg) translateZ(10px)');
				$('.photoButtonFilters').css('width',width);
				$(this).css('background-color','orange');

				$filters = ['.photography'];
				var $filtersJoin = $filters.join(', ');
				$grid.isotope({ filter: $filtersJoin });

		}
	})

	$('.designButton').click(function() {
		if($('.search').css('display') === 'inline-block') {
			$('.search').css('display','none')
		}

		if($('.photoButtonFilters').css('display') === 'inline-block') {
			$('.filterChoice').css('transform','none');
			$('.filterChoice').css('background-color','black');
			$('.filterChoice').data('selected', 0);
			$('.photoButton').data('selected', 0);

			$('.photoButtonFilters').css('display','none');
			$('.photoButton').css('transform','none');
			$('.photoButton').css('background-color','black');
			var index = $filters.indexOf('.photography');
			if (index > -1) {
				$filters.splice(index, 1);
			}
			var $filtersJoin = $filters.join(', ');
			$grid.isotope({ filter: $filtersJoin });
		}

		if($('.designButtonFilters').css('display') === 'inline-block') {
			$('.filterChoice').css('transform','none');
			$('.filterChoice').css('background-color','black');
			$('.filterChoice').data('selected', 0);

			$('.designButtonFilters').css('display','none');
			$(this).css('transform','none');
			$(this).css('background-color','black');
			$(this).data('selected', 0);
			var index = $filters.indexOf('.design');
			if (index > -1) {
				$filters.splice(index, 1);
			}
			var $filtersJoin = $filters.join(', ');
			$grid.isotope({ filter: $filtersJoin });
		} else {
			$('.filterChoice').css('transform','none');
			$('.filterChoice').css('background-color','black');
			$('.filterChoice').data('selected', 0);

				$('.designButtonFilters').css('display','inline-block');
				$('.mainArea').each( function() {
					if( $(this).css('display') === 'flex' ) {
						width = $(this).outerWidth();
					}
				})
				$(this).css('transform','rotateY(30deg) translateZ(10px)');
				$('.designButtonFilters').css('width',width);
				$(this).css('background-color','orange');
				$(this).data('selected', 1);

				$filters = ['.design'];
				var $filtersJoin = $filters.join(', ');
				$grid.isotope({ filter: $filtersJoin });
		}
	})

	<?php
        //remove_all_filters('posts_orderby');
        $args = array(
            'post_type' => 'design',
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
				$('.<?php echo removeBadStuff($choice); ?>Button').click(function() {
					if($(this).data('selected') === 1 ){
						var index = $filters.indexOf('.<?php echo removeBadStuff($choice); ?>');
						if (index > -1) {
						    $filters.splice(index, 1);
						}
						if( $filters.length === 0) {
							$filters.push( '.design' );
						}
						var $filtersJoin = $filters.join(', ');
					    $grid.isotope({ filter: $filtersJoin });
						$(this).css('transform','none');
						$(this).css('background-color','black');
						$(this).data('selected', 0);
					} else {
						$filters.push( '.<?php echo removeBadStuff($choice); ?>' );
						var index = $filters.indexOf('.design');
						if (index > -1) {
						    $filters.splice(index, 1);
						}
						var $filtersJoin = $filters.join(', ');
					    $grid.isotope({ filter: $filtersJoin });
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

	<?php
        //remove_all_filters('posts_orderby');
        $argsphoto = array(
            'post_type' => 'photography',
            'posts_per_page' => 1,
            'orderby'        => 'rand',
        );
        $queryphoto = new WP_Query($argsphoto);
        $featuredimage = get_field_objects();
    ?>

    <?php if( $queryphoto->have_posts() ): ?>
        <?php while ($queryphoto->have_posts()) : $queryphoto->the_post(); ?>

			<?php $field = get_field_object('focus');
			      $choices = $field['choices'];
				  ?>

			<?php foreach ($choices as $choice): ?>
				$('.<?php echo removeBadStuff($choice); ?>Button').click(function() {
					if($(this).data('selected') === 1 ){
						var index = $filters.indexOf('.<?php echo removeBadStuff($choice); ?>');
						if (index > -1) {
						    $filters.splice(index, 1);
						}
						if( $filters.length === 0) {
							$filters.push( '.photography' );
						}
						var $filtersJoin = $filters.join(', ');
					    $grid.isotope({ filter: $filtersJoin });
						$grid.isotope('layout');
						$(this).css('transform','none');
						$(this).css('background-color','black');
						$(this).data('selected', 0);
					} else {
						var index = $filters.indexOf('.photography');
						if (index > -1) {
						    $filters.splice(index, 1);
						}
						$filters.push( '.<?php echo removeBadStuff($choice); ?>' );
						console.log($filters);
						var $filtersJoin = $filters.join(', ');
						console.log($filtersJoin);
					    $grid.isotope({ filter: $filtersJoin });
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

	//isotope
//})


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
                    zoom        : 14,
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
                    map.setZoom( 14 );
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

			$('.clickDetect').click(function(){
					$('.acf-map').css('pointer-events','auto');})
			.mouseleave(function(){
						$('.acf-map').css('pointer-events','none');});

			$('.eventLink').click(function() {
				if($('.eventSection').css('display')==='block') {
					$('.workSection').css('display','block');
					$('.eventSection').css('display','none');
					$('.filterContainer').css('display','initial');
					$('.sidebar').removeClass('sidebarBlackout');
					$('body').css('background','white');
						$('#workLink').css('cursor','default');
							$('#studentLink').css('cursor','pointer');
					$('#workLink').css('color','#999999');
					$('#studentLink').css('color','black');
				} else {
					if($('#logoSmall').css('display')==='block') {
						$('.closePage').css('display','none');
					} else {
						$('.closePage').css('display','flex');
					}
					$('#workLink').css('color','white');
					$('#studentLink').css('cursor','pointer');
					$('#workLink').css('cursor','pointer');
					$('#studentLink').css('color','white');
					$('.workSection').css('display','none');
					$('.studentSection').css('display','none');
					$('.eventSection').css('display','block');
					google.maps.event.trigger(map, 'resize');
					center_map( map );
					$('.filterContainer').css('display','none');
					$('.sidebar').addClass('sidebarBlackout');
					$('body').css('background','black');
				}


			})


            })(jQuery);
            </script>



<?php get_footer(); ?>
