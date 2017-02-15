<?php
/**
 * The template for displaying 404 pages (not found).
 *
 */

get_header(); ?>

<?php include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); ?>

	<?php if (!is_plugin_active('redux-framework/redux-framework.php')){ ?>
		<!-- Breadcrumbs -->
		<div class="theme-breadcrumbs">
		    <div class="container">
		        <div class="row">
		            <div class="col-md-8">
	                	<h1 class="page-title">
		                	<?php esc_attr_e( '404 Page not found', 'churchwp' ); ?>
		                </h1>
		            </div>
		            <div class="col-md-4">
		                <ol class="breadcrumb pull-right">
		                    <?php churchwp_breadcrumb(); ?>
		                </ol>
		            </div>
		        </div>
		    </div>
		</div>
	<?php } ?>

	<!-- Page content -->
	<div id="primary" class="content-area">
	    <main id="main" class="container blog-posts site-main">
	        <div class="col-md-12 main-content">
				<section class="error-404 not-found">
					<header class="page-header-404">
						<?php
							if (is_plugin_active('redux-framework/redux-framework.php')){
								if (churchwp_redux('mt_404_page') == TRUE) {
									$id = churchwp_redux('mt_404_page');
						            $content_post   = get_post($id);
						            $content        = $content_post->post_content;
						            $content        = apply_filters('the_content', $content);
						            echo wp_kses_post($content);
						        }else{ ?>
									<div class="high-padding">
										<img class="aligncenter" src="<?php echo esc_url(get_template_directory_uri() . '/images/404.png'); ?>" alt="<?php esc_attr_e( 'Not Found', 'churchwp' ); ?>">
										<h2 class="page-title text-center"><?php esc_attr_e( 'Sorry, this page does not exist', 'churchwp' ); ?></h2>
										<h3 class="page-title text-center"><?php esc_attr_e( 'The link you clicked might be corrupted, or the page may have been removed.', 'churchwp' ); ?></h3>
									</div>
							<?php }
							}else{ ?>
								<div class="high-padding">
									<img class="aligncenter" src="<?php echo esc_url(get_template_directory_uri() . '/images/404.png'); ?>" alt="<?php esc_attr_e( 'Not Found', 'churchwp' ); ?>">
									<h2 class="page-title text-center"><?php esc_attr_e( 'Sorry, this page does not exist', 'churchwp' ); ?></h2>
									<h3 class="page-title text-center"><?php esc_attr_e( 'The link you clicked might be corrupted, or the page may have been removed.', 'churchwp' ); ?></h3>
								</div>
							<?php }
						 ?>
					</header>
				</section>
			</div>
		</main>
	</div>

<?php get_footer(); ?>