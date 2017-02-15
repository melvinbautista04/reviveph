<?php
/**
* Content Single
*/
?>


<?php include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); ?>
<!-- HEADER TITLE BREADCRUBS SECTION -->
<?php echo churchwp_header_title_breadcrumbs(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post high-padding'); ?>>
    <div class="container">
       <div class="row">
            <div class="sidebar-content-wrap">

                <?php if ( churchwp_redux('mt_single_blog_layout') == 'mt_single_blog_left_sidebar' && is_active_sidebar( churchwp_redux('mt_single_blog_layout_sidebar') )) { ?>
                    <div class="col-md-3 sidebar-content">
                        <?php dynamic_sidebar( churchwp_redux('mt_single_blog_layout_sidebar') ); ?>
                    </div>
                <?php } ?>


                <?php if ( churchwp_redux('mt_single_blog_layout') == 'mt_single_blog_fullwidth') {
                    $cols = 'col-md-12';
                }else{
                    $cols = 'col-md-9';
                } ?>
                <!-- POST CONTENT -->
                <div class="<?php echo esc_attr($cols); ?> main-content">
                    <!-- CONTENT -->
                    <div class="article-content">
                        
                        <?php if(churchwp_redux('mt_post_featured_image')){ ?>
                            <?php if(has_post_thumbnail()) { ?>
                                <?php $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ),'churchwp_1150x600' ); ?>
                                <?php if($thumbnail_src) { ?>
                                    <img src="<?php echo esc_url($thumbnail_src[0]); ?>" class="img-responsive single-post-featured-img" alt="<?php echo get_the_title(); ?>" />
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>


                        <div class="churchwp-meta-title">
                        
                            <!-- POST TITLE -->
                            <h1>
                                <?php echo the_title(); ?>
                            </h1>
                            <!-- // POST TITLE -->

                            <!-- POST METAS -->
                            <div class="churchwp-single-post-meta">
                                <span class="churchwp-meta-post-author">
                                    <?php echo esc_attr__('By ', 'churchwp'); ?>
                                    <a href="<?php echo esc_attr(get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) )); ?>">
                                        <?php echo get_the_author(); ?>
                                    </a>
                                </span>
                                <span class="churchwp-meta-post-pipe">|</span>
                                <span class="churchwp-meta-post-date">
                                    <?php echo get_the_date(); ?>
                                </span>
                                <span class="churchwp-meta-post-pipe">|</span>
                                <span class="churchwp-meta-post-categories">
                                    <?php echo get_the_term_list( get_the_ID(), 'category', '', ', ' ); ?>
                                </span>
                                <span class="churchwp-meta-post-pipe">|</span>
                                <span class="churchwp-meta-post-comments">
                                    <a href="<?php comments_link(); ?>">
                                        <?php comments_number( esc_attr('No Comments', 'churchwp'), esc_attr('1 Comment', 'churchwp'), esc_attr('% Comments', 'churchwp') ); ?>
                                    </a>
                                </span>
                                <?php edit_post_link('Edit Post', '<span class="edit-post label label-info edit-t">', ' <i class="icon-note"></i></span>'); ?>
                            </div>
                            <!-- // POST METAS -->

                        </div>


                        <?php the_content(); ?>
                        <div class="clearfix"></div>
                        
                        <?php if (get_the_tags()) { ?>
                            <div class="single-post-tags">
                                <?php echo esc_attr__( 'Post tags: ', 'churchwp' ) . get_the_term_list( get_the_ID(), 'post_tag', '', ' ' ); ?>
                            </div>
                        <?php } ?>
                        <div class="clearfix"></div>
                      
                        <?php
                            wp_link_pages( array(
                                'before' => '<div class="page-links">' . esc_attr__( 'Pages:', 'churchwp' ),
                                'after'  => '</div>',
                            ) );
                        ?>
                        <div class="clearfix"></div>

                        <!-- AUTHOR BIO -->
                        <?php if ( churchwp_redux('mt_enable_authorbio') ) { ?>

                            <?php   
                            $avatar = get_avatar( get_the_author_meta('email'), '80', get_the_author() );
                            $has_image = '';
                            if( $avatar !== false ) {
                                $has_image .= 'no-author-pic';
                            }
                            ?>

                            <div class="author-bio relative <?php echo esc_attr($has_image); ?>">
                                <div class="author-thumbnail col-md-4">
                                    <?php
                                    if( $avatar !== false ) {
                                        echo get_avatar( get_the_author_meta('email'), '80', get_the_author() ); 
                                    }
                                    ?>
                                    <div class="pull-left">
                                        <div class="author-name">
                                            <span><?php echo esc_attr__('Article by','churchwp'); ?></span>
                                            <span class="name"><?php echo get_the_author(); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="author-thumbnail col-md-8">
                                    <div class="author-biography"><?php the_author_meta('description'); ?></div>
                                </div>
                            </div>
                        <?php } ?>


                        <div class="clearfix"></div>

                        <!-- COMMENTS -->
                        <?php
                            // If comments are open or we have at least one comment, load up the comment template
                            if ( comments_open() || get_comments_number() ) {
                                comments_template();
                            }
                        ?>
                    </div>
                </div>

                <?php if (is_plugin_active('redux-framework/redux-framework.php')) { ?>
                    <?php if ( churchwp_redux('mt_single_blog_layout') == 'mt_single_blog_right_sidebar' && is_active_sidebar( churchwp_redux('mt_single_blog_layout_sidebar') )) { ?>
                        <div class="col-md-3 sidebar-content">
                            <?php dynamic_sidebar( churchwp_redux('mt_single_blog_layout_sidebar') ); ?>
                        </div>
                    <?php } ?>
                <?php }else{ ?>
                    <div class="col-md-3 sidebar-content">
                        <?php dynamic_sidebar(); ?>
                    </div>
                <?php } ?>


            </div>
        </div>
    </div>
</article>


<div class="row post-details-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if ( churchwp_redux('mt_enable_related_posts') ) { ?>

                <div class="clearfix"></div>
                <div class="related-posts sticky-posts">
                    <?php
                    global  $post;  
                    $orig_post = $post;  
                    $tags = wp_get_post_tags($post->ID);  
                    ?>

                    <?php if ($tags) { ?>
                    <h2 class="heading-bottom"><?php esc_attr_e('Related Posts', 'churchwp'); ?></h2>
                    <div class="row">
                        <?php $tag_ids = array();  
                        foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;  
                        $args=array(  
                            'tag__in'               => $tag_ids,  
                            'post__not_in'          => array($post->ID),  
                            'posts_per_page'        => 3, // Number of related posts to display.  
                            'ignore_sticky_posts'   => 1  
                        );  

                        $my_query = new wp_query( $args );  

                        while( $my_query->have_posts() ) {  
                            $my_query->the_post(); 
                        
                        ?>  
                            <div class="col-md-4 post">
                                <div class="related_blog_custom">
                                    <?php $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),'churchwp_related_post_pic700x400' ); ?>
                                    <?php if($thumbnail_src){ ?>
                                    <a href="<?php the_permalink(); ?>" class="relative">
                                        <?php if($thumbnail_src) { ?>
                                            <img src="<?php echo esc_attr($thumbnail_src[0]); ?>" class="img-responsive" alt="<?php the_title(); ?>" />
                                        <?php } ?>
                                    </a>
                                    <?php } ?>
                                    <div class="related_blog_details">
                                        <h4 class="post-name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                        <div class="post-author"><?php echo esc_attr('Posted by ','churchwp'); ?><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php echo get_the_author(); ?></a> - <?php echo get_the_date( 'j M' ); ?></div>
                                    </div>
                                </div>
                            </div>

                        <?php 
                        } ?>
                    </div>
                    <?php } ?>
                </div>
                    <?php 
                    $post = $orig_post;  
                    wp_reset_postdata();  
                    ?>  

                <?php } ?>

            </div>
        </div>
    </div>
</div>