<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 */

get_header(); 

$class_row = "col-md-12";
if ( churchwp_redux('mt_blog_layout') == 'mt_blog_fullwidth' ) {
    $class_row = "col-md-12";
}elseif ( churchwp_redux('mt_blog_layout') == 'mt_blog_right_sidebar' or churchwp_redux('mt_blog_layout') == 'mt_blog_left_sidebar') {
    $class_row = "col-md-9";
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

                <?php
                    if ( churchwp_redux('mt_blog_layout') == 'mt_blog_left_sidebar') {
                        echo '<div class="col-md-3 sidebar-content">';
                            dynamic_sidebar( $sidebar );
                        echo '</div>';
                    }
                ?>

                <div class="<?php echo esc_attr($class_row); ?> main-content">
                    <?php if ( have_posts() ) : ?>
                        <div class="row">

                            <?php /* Start the Loop */ ?>
                            <?php while ( have_posts() ) : the_post(); ?>

                                <?php get_template_part( 'content', 'post' ); ?>
                                    
                            <?php endwhile; ?>
                            
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

                <?php
                    if ( churchwp_redux('mt_blog_layout') == 'mt_blog_right_sidebar') {
                        echo '<div class="col-md-3 sidebar-content">';
                            dynamic_sidebar( $sidebar );
                        echo '</div>';
                    }
                ?>
            </div>
        </div>
    </div>

<?php get_footer(); ?>