<?php
/**
 * Template part for displaying author information.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Mocho_Blog
 */

$enable_author_section = mocho_blog_get_option( 'mocho_blog_enable_author_section' );

if( $enable_author_section == true ) {
    ?>
    <div class="author_box">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-12">
                <div class="author_thumb">
                    <?php echo get_avatar( get_the_author_meta( 'ID' ), 300 ); ?>
                </div><!-- .author_thumb -->
            </div><!-- .col-* -->
            <div class="col-md-9 col-sm-9 col-xs-12">
                <div class="author_details">
                    <div class="author_name">
                        <h3><?php echo esc_html( get_the_author() ); ?></h3>
                    </div><!-- .author_name -->
                    <div class="author_desc">
                        <p><?php echo esc_html( get_the_author_meta( 'description' ) ); ?></p>
                    </div><!-- .author_desc -->
                </div><!-- .author_details -->
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- .author_box -->
    <?php
}
