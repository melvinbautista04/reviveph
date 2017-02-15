<?php
// SERMON METABOXES
//MP3
$tslr_sermon_mp3 = get_post_meta( get_the_ID(), 'tslr_sermon_mp3', true );
$tslr_sermon_mp3_title = get_post_meta( get_the_ID(), 'tslr_sermon_mp3_title', true );

//MP4
$tslr_sermon_mp4 = get_post_meta( get_the_ID(), 'tslr_sermon_mp4', true );
$tslr_sermon_mp4_title = get_post_meta( get_the_ID(), 'tslr_sermon_mp4_title', true );

#YouTube/Vimeo
$tslr_sermon_youtube_vimeo = get_post_meta( get_the_ID(), 'tslr_sermon_youtube_vimeo', true );
$tslr_sermon_youtube_vimeo_title = get_post_meta( get_the_ID(), 'tslr_sermon_youtube_vimeo_title', true );

//PDF
$tslr_sermon_pdf = get_post_meta( get_the_ID(), 'tslr_sermon_pdf', true );
$tslr_sermon_pdf_title = get_post_meta( get_the_ID(), 'tslr_sermon_pdf_title', true );
?>

<div class="clearfix"></div>


<article id="post-<?php the_ID(); ?>" <?php post_class('post high-padding'); ?>>
    <div class="container">
        <div class="row">
            <div class="col-md-12 main-content">
                <div class="article-content row">
                    <div class="col-md-12">
                        <?php
                            if(has_post_thumbnail()){
                                the_post_thumbnail( 'churchwp_1150x600' );
                            }
                        ?>
                    </div>

                    <div class="clearfix"></div>
                    <div class="portfolio-bottom-description">
                        <div class="col-md-8">

                            <h3 class="post-name"><?php echo get_the_title(); ?></h3>

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
                               
                                <?php edit_post_link('Edit Post', '<span class="edit-post label label-info edit-t">', ' <i class="icon-note"></i></span>'); ?>
                            </div>
                            <!-- // POST METAS -->
                            <?php the_content(); ?>
                        </div>
                        <div class="col-md-4 churchwp-metas">
                            <h3 class="post-name"><?php echo esc_attr__('Sermon Media','churchwp'); ?></h3>
                            <?php if (isset($tslr_sermon_mp3) && !empty($tslr_sermon_mp3)) { ?>
                                <div class="churchwp-single-meta">
                                    <?php if(isset($tslr_sermon_mp3_title)){ ?>
                                        <h4 class="sermon-media-label"><?php echo wp_kses_post($tslr_sermon_mp3_title); ?></h4>
                                    <?php } ?>
                                    <?php echo do_shortcode('[audio src="'.$tslr_sermon_mp3.'"]'); ?>
                                </div>
                            <?php } ?>
                            
                            <?php if (isset($tslr_sermon_mp4) && !empty($tslr_sermon_mp4)) { ?>
                                <div class="churchwp-single-meta">
                                    <?php if(isset($tslr_sermon_mp4_title)){ ?>
                                        <h4 class="sermon-media-label"><?php echo wp_kses_post($tslr_sermon_mp4_title); ?></h4>
                                    <?php } ?>
                                    <?php echo do_shortcode('[video src="'.$tslr_sermon_mp4.'"]'); ?>
                                </div>
                            <?php } ?>

                            <?php if (isset($tslr_sermon_youtube_vimeo) && !empty($tslr_sermon_youtube_vimeo)) { ?>
                                <div class="churchwp-single-meta">
                                    <?php if(isset($tslr_sermon_youtube_vimeo_title)){ ?>
                                        <h4 class="sermon-media-label"><?php echo wp_kses_post($tslr_sermon_youtube_vimeo_title); ?></h4>
                                    <?php } ?>
                                    <?php echo do_shortcode('[vc_video link="'.$tslr_sermon_youtube_vimeo.'"]'); ?>
                                </div>
                            <?php } ?>

                            <?php if (isset($tslr_sermon_pdf) && !empty($tslr_sermon_pdf)) { ?>
                                <div class="churchwp-single-meta">
                                    <?php if(isset($tslr_sermon_pdf_title)){ ?>
                                        <h4 class="sermon-media-label"><?php echo wp_kses_post($tslr_sermon_pdf_title); ?></h4>
                                    <?php } ?>
                                    <a class="sermon-pdf" href="<?php echo esc_url($tslr_sermon_pdf); ?>">
                                        <i class="icon-book-open icons"></i>
                                        <?php echo esc_attr__('Open Sermon Document', 'churchwp'); ?>
                                    </a>
                                </div>
                            <?php } ?>
                            

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</article>


<div class="row post-details-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="clearfix"></div>
                <div class="related-posts sticky-posts">
                    <h2 class="heading-bottom"><?php esc_attr_e('More Sermons', 'churchwp'); ?></h2>
                    <div class="row">
                        <?php
                        $args_sticky_posts = array(
                            'posts_per_page'        => 3,
                            'post__not_in'          => array(get_the_ID()),  
                            'post_type'             => 'tslr-sermon',
                            'post_status'           => 'publish' 
                        );
                        $sticky_posts = get_posts($args_sticky_posts);

                        foreach ($sticky_posts as $post) { 
                            $excerpt = get_post_field('post_content', $post->ID);
                            $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),'churchwp_post_pic700x450' );
                            $author_id = $post->post_author;
                            //$author_name = get_author_name( $author_id );

                        ?>
                        <article class="col-md-4 single-post post">
                            <div class="related_blog_custom">
                                <?php $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),'churchwp_related_post_pic700x400' ); ?>
                                <?php if($thumbnail_src){ ?>
                                <a href="<?php the_permalink(); ?>" class="relative">
                                    <?php if($thumbnail_src) { ?>
                                        <img src="<?php echo esc_attr($thumbnail_src[0]); ?>" class="img-responsive" alt="<?php the_title(); ?>" />
                                        <span class="read-more-overlay">
                                            <i class="icon-link"></i>
                                        </span>
                                    <?php } ?>
                                </a>
                                <?php } ?>
                                <div class="related_blog_details">
                                    <h4 class="post-name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                    <div class="post-author"><?php echo esc_attr('Posted by ','churchwp'); ?><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php echo get_the_author(); ?></a> - <?php echo get_the_date( 'j M' ); ?></div>
                                </div>
                            </div>
                        </article>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>