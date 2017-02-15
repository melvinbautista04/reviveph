<?php
/**
 * The template for displaying tags results pages.
 *
 */

get_header(); 

$class = "";
if ( churchwp_redux('mt_blog_layout') == 'mt_blog_fullwidth' ) {
    $class = "col-md-12";
}elseif ( churchwp_redux('mt_blog_layout') == 'mt_blog_right_sidebar' or churchwp_redux('mt_blog_layout') == 'mt_blog_left_sidebar') {
    $class = "col-md-9";
}
$sidebar = churchwp_redux('mt_blog_layout_sidebar');
?>

<!-- HEADER TITLE BREADCRUBS SECTION -->
<?php echo churchwp_header_title_breadcrumbs(); ?>

<!-- Page content -->
<div class="high-padding">
    <!-- Blog content -->
    <div class="container blog-posts">
        <div class="row">
            <div class="col-md-12 main-content">
            <?php if ( have_posts() ) : ?>
                <div class="row">

                    <?php if ( churchwp_redux('mt_blog_layout') == 'mt_blog_left_sidebar' && is_active_sidebar( churchwp_redux('mt_blog_layout_sidebar') )) { ?>
                        <div class="col-md-3 sidebar-content">
                            <?php dynamic_sidebar( churchwp_redux('mt_blog_layout_sidebar') ); ?>
                        </div>
                    <?php } ?>

                    <?php /* Start the Loop */ ?>
                    <?php while ( have_posts() ) : the_post(); ?>
                        <div class='<?php echo esc_attr($class); ?>'>
                            <div class="row">
                                <?php get_template_part( 'content', 'post' ); ?>
                            </div>
                        </div>
                    <?php endwhile; ?>

                    <?php if ( churchwp_redux('mt_blog_layout') == 'mt_blog_right_sidebar' && is_active_sidebar( churchwp_redux('mt_blog_layout_sidebar') )) { ?>
                        <div class="col-md-3 sidebar-content">
                            <?php dynamic_sidebar( churchwp_redux('mt_blog_layout_sidebar') ); ?>
                        </div>
                    <?php } ?>

                    <div class="clearfix"></div>

                    <div class="theme-pagination-holder col-md-12">             
                        <div class="theme-pagination pagination">             
                            <?php churchwp_pagination(); ?>
                        </div>
                    </div>
                </div>
            <?php else : ?>
                <?php get_template_part( 'content', 'none' ); ?>
            <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>