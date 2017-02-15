<?php
/*
* Template Name: Blog
*/


get_header(); 

$class = "";

if ( churchwp_redux('mt_blog_layout') == 'mt_blog_fullwidth' ) {
    $class = "col-md-12";
}elseif ( churchwp_redux('mt_blog_layout') == 'mt_blog_right_sidebar' or churchwp_redux('mt_blog_layout') == 'mt_blog_left_sidebar') {
    $class = "col-md-9";
}
$breadcrumbs_on_off = get_post_meta( get_the_ID(), 'breadcrumbs_on_off', true );
$blog_page_header = get_post_meta( get_the_ID(), 'blog_page_header', true );
?>


<!-- HEADER TITLE BREADCRUBS SECTION -->
<?php echo churchwp_header_title_breadcrumbs(); ?>


<!-- Page content -->
<div class="high-padding">
    <?php
    wp_reset_postdata();
    $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
    $args = array(
        'post_type'        => 'post',
        'post_status'      => 'publish',
        'paged'            => $paged,
    );
    $posts = new WP_Query( $args );
    ?>
    <!-- Blog content -->
    <div class="container blog-posts">
        
        <h2 class="blog_heading heading-bottom ">
            <?php echo churchwp_redux('mt_blog_post_title'); ?>
        </h2>
        <div class="row">

            <div class="col-md-12 main-content">
                <div class="row">

		            <?php if ( churchwp_redux('mt_blog_layout') == 'mt_blog_left_sidebar' && is_active_sidebar( churchwp_redux('mt_blog_layout_sidebar') )) { ?>
		                <div class="col-md-3 sidebar-content">
		                    <?php dynamic_sidebar( churchwp_redux('mt_blog_layout_sidebar') ); ?>
		                </div>
		            <?php } ?>

                    <div class='<?php echo esc_attr($class); ?> blog-posts-list'>
                    	<div class="row"> 
			                <?php if ( $posts->have_posts() ) : ?>
			                    <?php /* Start the Loop */ ?>
			                    <?php while ( $posts->have_posts() ) : $posts->the_post(); ?>

			                    	<?php get_template_part( 'content', 'post' ); ?>

			                    <?php endwhile; ?>
			                    <?php echo '<div class="clearfix"></div>'; ?>
			                <?php else : ?>
			                    <?php get_template_part( 'content', 'none' ); ?>
			                <?php endif; ?>
                        </div>
                    </div>

		            <?php if ( churchwp_redux('mt_blog_layout') == 'mt_blog_right_sidebar' && is_active_sidebar( churchwp_redux('mt_blog_layout_sidebar') )) { ?>
		                <div class="col-md-3 sidebar-content">
		                    <?php dynamic_sidebar( churchwp_redux('mt_blog_layout_sidebar') ); ?>
		                </div>
		            <?php } ?>

                <div class="clearfix"></div>

                <?php 
                query_posts($args);
                global  $wp_query;
                if ($wp_query->max_num_pages != 1) { ?>                
                <div class="theme-pagination-holder col-md-12">           
                    <div class="theme-pagination pagination">           
                        <?php churchwp_pagination(); ?>
                    </div>
                </div>
                <?php } ?>
                </div>
            </div>

        </div>
    </div>
</div>


<?php
get_footer();
?>