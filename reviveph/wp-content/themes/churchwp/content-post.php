<?php 
$placeholder = '600x500';
$master_class = 'col-md-12';
$thumbnail_class = 'col-md-4';
$post_details_class = 'col-md-8';
$type_class = 'list-view';

if ( churchwp_redux('mt_blog_display_type') == 'list' ) {
    $master_class = 'col-md-12';
    $thumbnail_class = 'col-md-4';
    $post_details_class = 'col-md-8';
    $type_class = 'list-view';
} else {
    if ( churchwp_redux('mt_blog_grid_columns') == 1 ) {
        $master_class = 'col-md-12';
        $type_class .= ' grid-one-column';
        $placeholder = '900x500';
    }elseif ( churchwp_redux('mt_blog_grid_columns') == 2 ) {
        $master_class = 'col-md-6';
        $type_class .= ' grid-two-columns';
        $placeholder = '900x500';
    }elseif ( churchwp_redux('mt_blog_grid_columns') == 3 ) {
        $master_class = 'col-md-4';
        $type_class .= ' grid-three-columns';
        $placeholder = '600x500';
    }elseif ( churchwp_redux('mt_blog_grid_columns') == 4 ) {
        $master_class = 'col-md-3';
        $type_class .= ' grid-four-columns';
        $placeholder = '600x500';
    }
    $thumbnail_class = 'full-width-part';
    $post_details_class = 'full-width-part';
} 


// THUMBNAIL
$post_img = '';
$thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'churchwp_1150x600' );
if ($thumbnail_src) {
    $post_img = '<img class="blog_post_image" src="'. esc_url($thumbnail_src[0]) . '" alt="'.get_the_title().'" />';
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('single-post grid-view '.$master_class.' '.$type_class); ?> > 
    <div class="blog_custom">

        <?php if ($post_img) { ?>
            <!-- POST THUMBNAIL -->
            <div class="col-md-12 post-thumbnail">
                <a href="<?php the_permalink(); ?>" class="relative">
                    <?php echo wp_kses_post($post_img); ?>
                    <span class="read-more-overlay">
                        <i class="icon-link"></i>
                    </span>
                </a>
            </div>
        <?php } ?>

        <!-- POST DETAILS -->
        <div class="col-md-12 post-details">

            <h3 class="post-name row">
                <a title="<?php the_title() ?>" href="<?php the_permalink(); ?>">
                    <?php the_title() ?>
                </a>
                <?php if (is_sticky()) { ?>
                    <span class="is_sticky"><?php echo esc_attr('Featured', 'churchwp'); ?></span>
                <?php } ?>
            </h3>
            
            <div class="post-category-comment-date row">
                <span class="post-date">
                    <a title="<?php the_title() ?>" href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a>
                </span> 
                <span class="post-author"><?php echo esc_attr__('by', 'churchwp'); ?> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php echo get_the_author(); ?></a></span>
                <span class="post-tags">
                    <?php echo esc_attr__('in', 'churchwp'); ?>  <?php echo get_the_term_list( get_the_ID(), 'category', '', ' / ' ); ?>
                </span>
            </div>

            <div class="post-excerpt row">
            <?php
                /* translators: %s: Name of current post */
                the_content( sprintf(__( 'Read More <i class="fa fa-long-arrow-right" aria-hidden="true"></i>', 'churchwp' ),
                    the_title( '<span class="screen-reader-text">"', '"</span>', false )
                ) );
            ?>
            <?php
                wp_link_pages( array(
                    'before' => '<div class="page-links">' . esc_attr__( 'Pages:', 'churchwp' ),
                    'after'  => '</div>',
                ) );
            ?>
            </div>
        </div>
    </div>
</article>