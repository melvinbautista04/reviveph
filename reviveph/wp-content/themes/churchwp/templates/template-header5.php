<header class="header5">

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

        <!-- LOGO -->
        <div class="navbar-header col-md-12">
          <?php if ( !class_exists( 'mega_main_init' ) ) { ?>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          <?php } ?>

          <h1 class="logo text-center">
            <a href="<?php echo get_site_url(); ?>">
              <?php if(churchwp_redux('mt_logo','url')){ ?>
                <img src="<?php echo esc_attr(churchwp_redux('mt_logo','url')); ?>" alt="<?php echo esc_attr(get_bloginfo()); ?>" />
              <?php }else{ 
                echo esc_attr(get_bloginfo());
              } ?>
            </a>
          </h1>
        </div>

        <!-- NAV MENU -->
        <div id="navbar" class="navbar-collapse collapse col-md-12">
          <?php echo churchwp_get_nav_menu(); ?>
        </div>
      </div>
    </div>
  </nav>
</header>