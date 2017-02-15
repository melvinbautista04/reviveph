<?php
/**
 * The template for displaying the footer.
 *
*/
?>

    <!-- FOOTER -->
    <footer>
        <!-- FOOTER TOP -->
        <div class="row footer-top">
            <div class="container">
            <?php
                $rows_status = get_post_meta( get_the_ID(), 'mt_custom_footer_options_status', true );
                $row1_status = get_post_meta( get_the_ID(), 'mt_footer_custom_row1_status', true );
                $row2_status = get_post_meta( get_the_ID(), 'mt_footer_custom_row2_status', true );
                $row3_status = get_post_meta( get_the_ID(), 'mt_footer_custom_row3_status', true );
          
                //FOOTER ROW #1
                if ($rows_status == 'yes' && $row1_status == 'enabled') {
                    echo churchwp_footer_row1();
                }
             
                //FOOTER ROW #2
                if ($rows_status == 'yes' && $row2_status == 'enabled') {
                    echo churchwp_footer_row2();
                }
             
                //FOOTER ROW #3
                if ($rows_status == 'yes' && $row3_status == 'enabled') {
                    echo churchwp_footer_row3();
                }
             ?>
            </div>
        </div>

        <!-- FOOTER BOTTOM -->
        <div class="row footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <p class="copyright"><?php echo wp_kses_post(churchwp_redux('mt_footer_text')); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>


<?php if (!churchwp_is_plugin_active('redux-framework/redux-framework.php')){ ?>
    <!-- BACK TO TOP BUTTON -->
    <a class="back-to-top themeslr-is-visible themeslr-fade-out" href="#0">
        <span></span>
    </a>
<?php }else{ ?>
    <?php if (churchwp_redux('mt_backtotop_status') == true) { ?>
        <?php 
        if (churchwp_redux('mt_backtotop_border_status') == 0) {
            $border_status = 'has-no-border';
        }else{
            $border_status = 'has-border';
        } ?>
        <!-- BACK TO TOP BUTTON -->
        <a class="back-to-top themeslr-is-visible themeslr-fade-out <?php echo esc_attr($border_status); ?>" href="#0">
            <span></span>
        </a>
    <?php } ?>
<?php } ?>


<?php wp_footer(); ?>
</body>
</html>