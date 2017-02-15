<header class="header2">

  <?php if (churchwp_redux('mt_header_top_status') == true) { ?>
    <!-- TOP HEADER -->
    <div class="top-header">
      <div class="container">
        <div class="row">

          <div class="col-md-6 col-sm-6 text-left left-side">
            <?php echo churchwp_get_top_left(); ?>
          </div>

          <div class="col-md-6 col-sm-6 text-right right-side">
            <?php echo churchwp_get_top_right(); ?>
          </div>

        </div>
      </div>
    </div>
  <?php } ?>

  <!-- BOTTOM BAR -->
  <nav class="navbar navbar-default" id="theme-main-head">
    <div class="container">
        <div class="row">

          <!-- NAV MENU -->
          <div id="navbar" class="navbar-collapse collapse col-md-9">
            <?php echo churchwp_get_nav_menu(); ?>

            <div class="header-nav-actions">

	        <!-- DONATIONS BUTTON -->
	        <?php 
	        if (churchwp_redux('mt_donations_page')) {
	          $donation_id = churchwp_redux('mt_donations_page');
	          $donation_url = get_permalink( $donation_id );
	        }else{
	          $donation_url = '#';
	        } ?>
  			<a href="<?php echo esc_attr($donation_url); ?>" class="donate-now pull-left">
  				<?php echo esc_attr__('Donate', 'churchwp'); ?>
  			</a>

              <?php if(churchwp_redux('mt_header_fixed_sidebar_menu_status') == true){ ?>
                <!-- MT BURGER -->
                <div id="mt-nav-burger">
                  <span></span>
                  <span></span>
                  <span></span>
                  <span></span>
                  <span></span>
                  <span></span>
                </div>
              <?php } ?>

              <?php if(churchwp_redux('mt_header_is_search') == true){ ?>
                <?php 
                  if(churchwp_redux('mt_header_is_search_mobile') == false){
                    $search_status = 'hidden_on_mobile';
                  }else{
                    $search_status = '';
                  }
                ?>
                <a href="#" class="mt-search-icon <?php echo esc_attr($search_status); ?>">
                  <i class="fa fa-search" aria-hidden="true"></i>
                </a>
              <?php } ?>

              <?php if(churchwp_redux('mt_header_is_search') == true){ ?>
              <!-- Search Form -->
              <div class="fixed-search-overlay">
                  <!-- INSIDE SEARCH OVERLAY -->
                  <div class="fixed-search-inside">
                      <?php echo churchwp_custom_search_form(); ?>
                  </div>
              </div>
              <?php } ?>
              
            </div>

          </div>

          <!-- LOGO -->
          <div class="navbar-header col-md-3">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>

            <?php if(churchwp_redux('mt_logo','url')){ ?>
              <h1 class="logo">
                  <a href="<?php echo get_site_url(); ?>">
                      <img src="<?php echo esc_attr(churchwp_redux('mt_logo','url')); ?>" alt="<?php echo esc_attr(get_bloginfo()); ?>" />
                  </a>
              </h1>
            <?php }else{ ?>
              <h1 class="logo no-logo">
                  <a href="<?php echo esc_url(get_site_url()); ?>">
                    <?php echo esc_attr(get_bloginfo()); ?>
                  </a>
              </h1>
            <?php } ?>
          </div>
        </div>
    </div>
  </nav>
</header>
