<?php
/**
 * The template for displaying Category pages.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Odin
 * @since 2.2.0
 */

get_header(); ?>
    <div class="container">
        <main id="content" class="<?php echo odin_classes_page_sidebar(); ?> section" role="main">
            <?php if ( have_posts() ) : ?>
                <header class="page-header">
                    <?php
                        the_archive_title( '<h1 class="page-title section__title">', '</h1>' );
                        the_archive_description( '<div class="taxonomy-description">', '</div>' );
                    ?>
                </header><!-- .page-header -->

                <div class="card">
                <?php
                        // Start the Loop.
                        while ( have_posts() ) : the_post();
                        /*
                            * Include the post format-specific template for the content. If you want to
                            * use this in a child theme, then include a file called called content-___.php
                            * (where ___ is the post format) and that will be used instead.
                            */
                        get_template_part( 'content', get_post_format() );
                        endwhile;

                        // Page navigation.
                        odin_paging_nav();
                    else :
                        // If no content, include the "No posts found" template.
                        get_template_part( 'content', 'none' );
                    endif;
                ?>
            </div>
        </main><!-- #main -->
        <?php get_sidebar(); ?>
    </div>
<?php get_footer();