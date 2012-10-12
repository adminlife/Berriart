<?php 
global $berriart;

get_header(); ?>

<div id="theblog">
    <div class="row">
        <div class=" eight columns">
            <div class="main">
                
                <?php if ( have_posts() ) : ?>

                    <?php /* Start the Loop */ ?>
                    <?php while ( have_posts() ) : the_post(); ?>

                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                <header class="entry-header">
                                    <h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

                                    <?php if ( 'post' == get_post_type() ) : ?>
                                        <div class="entry-meta">
                                                <?php $berriart->postedOn(); ?>
                                        </div><!-- .entry-meta -->
                                    <?php endif; ?>
                                </header><!-- .entry-header -->

                                <div class="entry-content">
                                        <?php the_content(); ?>
                                        <?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'twentyeleven' ) . '</span>', 'after' => '</div>' ) ); ?>
                                </div><!-- .entry-content -->

                                <footer class="entry-meta">
                                        <?php
                                                /* translators: used between list items, there is a space after the comma */
                                                $categories_list = get_the_category_list( __( ', ', 'twentyeleven' ) );

                                                /* translators: used between list items, there is a space after the comma */
                                                $tag_list = get_the_tag_list( '', __( ', ', 'twentyeleven' ) );
                                                if ( '' != $tag_list ) {
                                                        $utility_text = __( 'This entry was posted in %1$s and tagged %2$s by <a href="%6$s">%5$s</a>. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'twentyeleven' );
                                                } elseif ( '' != $categories_list ) {
                                                        $utility_text = __( 'This entry was posted in %1$s by <a href="%6$s">%5$s</a>. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'twentyeleven' );
                                                } else {
                                                        $utility_text = __( 'This entry was posted by <a href="%6$s">%5$s</a>. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'twentyeleven' );
                                                }

                                                printf(
                                                        $utility_text,
                                                        $categories_list,
                                                        $tag_list,
                                                        esc_url( get_permalink() ),
                                                        the_title_attribute( 'echo=0' ),
                                                        get_the_author(),
                                                        esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) )
                                                );
                                        ?>
                                        <?php edit_post_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?>

                                        <?php if ( get_the_author_meta( 'description' ) && ( ! function_exists( 'is_multi_author' ) || is_multi_author() ) ) : // If a user has filled out their description and this is a multi-author blog, show a bio on their entries ?>
                                        <div id="author-info">
                                                <div id="author-avatar">
                                                        <?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'twentyeleven_author_bio_avatar_size', 68 ) ); ?>
                                                </div><!-- #author-avatar -->
                                                <div id="author-description">
                                                        <h2><?php printf( __( 'About %s', 'twentyeleven' ), get_the_author() ); ?></h2>
                                                        <?php the_author_meta( 'description' ); ?>
                                                        <div id="author-link">
                                                                <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
                                                                        <?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'twentyeleven' ), get_the_author() ); ?>
                                                                </a>
                                                        </div><!-- #author-link	-->
                                                </div><!-- #author-description -->
                                        </div><!-- #entry-author-info -->
                                        <?php endif; ?>
                                </footer><!-- .entry-meta -->
                        </article><!-- #post-<?php the_ID(); ?> -->

                    <?php endwhile; ?>

                    <?php $berriart->contentNav( 'nav-below' ); ?>

                <?php else : ?>

                    <article id="post-0" class="post no-results not-found">
                            <header class="entry-header">
                                    <h1 class="entry-title"><?php _e( 'Nothing Found', 'twentyeleven' ); ?></h1>
                            </header><!-- .entry-header -->

                            <div class="entry-content">
                                    <p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'twentyeleven' ); ?></p>
                                    <?php get_search_form(); ?>
                            </div><!-- .entry-content -->
                    </article><!-- #post-0 -->

                <?php endif; ?>
                
            </div>
        </div>

        <div class="four columns">
                <h4>Getting Started</h4>
                <p>We're stoked you want to try Foundation! To get going, this file (index.html) includes some basic styles you can modify, play around with, or totally destroy to get going.</p>

                <h4>Other Resources</h4>
                <p>Once you've exhausted the fun in this document, you should check out:</p>
                <ul class="disc">
                        <li><a href="http://foundation.zurb.com/docs">Foundation Documentation</a><br />Everything you need to know about using the framework.</li>
                        <li><a href="http://github.com/zurb/foundation">Foundation on Github</a><br />Latest code, issue reports, feature requests and more.</li>
                        <li><a href="http://twitter.com/foundationzurb">@foundationzurb</a><br />Ping us on Twitter if you have questions. If you build something with this we'd love to see it (and send you a totally boss sticker).</li>
                </ul>
        </div>
    </div>
</div>
<?php get_footer(); ?>
