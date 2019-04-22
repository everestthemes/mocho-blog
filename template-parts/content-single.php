<div id="post-<?php the_ID(); ?>" <?php post_class( "postpage_entry" ); ?>>
    <div class="post_title">
        <?php the_title( '<h2>', '</h2>' ); ?>
    </div><!-- .post_title -->
    <div class="meta">
        <ul class="post_meta">
            <li class="posted_date"><?php mocho_blog_posted_on(); ?></li>
            <li class="posted_by"><?php mocho_blog_posted_by(); ?></li>
            <li class="posted_in"><?php mocho_blog_single_post_categories(); ?></a></li>
        </ul><!-- .post_meta -->
    </div><!-- .meta -->
    <?php 
        if( has_post_thumbnail() ) : 
            ?>
            <div class="post_thumb post_media">
                <?php 
                    the_post_thumbnail( 'full', array( 'alt' => the_title_attribute( array( 'echo' => false ) ) ) ); 
                ?>
            </div><!-- .post_thumb.post_media -->
            <?php 
        endif; 
    ?>
    <div class="editor_contents">
        <?php 
        the_content( sprintf(
            wp_kses(
                /* translators: %s: Name of current post. Only visible to screen readers */
                __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'mocho-blog' ),
                array(
                    'span' => array(
                        'class' => array(),
                    ),
                )
            ),
            get_the_title()
        ) );

        wp_link_pages( array(
            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'mocho-blog' ),
            'after'  => '</div>',
        ) );
        ?>
    </div><!-- .editor_contents -->

    <?php 

    mocho_blog_single_post_tags();

    get_template_part( 'template-parts/content', 'author' );

    the_post_navigation(); 

    get_template_part( 'template-parts/content', 'related' );

    ?>

</div><!-- .postpage_entry -->