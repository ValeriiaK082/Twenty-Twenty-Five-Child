<?php get_header(); ?>
<div class="container my-5">
    <?php if ( have_posts() ) :
        while ( have_posts() ) : the_post();
            $genres = get_the_terms(get_the_ID(), 'book_genre'); ?>
        <!-- Current Book Info -->
        <div class="row mb-5 align-items-center">
            <!-- Featured Image -->
            <div class="col-12 col-md-4 mb-3 mb-md-0">
                <?php if ( has_post_thumbnail() ) : ?>
                    <img src="<?php the_post_thumbnail_url('large'); ?>"
                         class="img-fluid rounded shadow-sm"
                         alt="<?php the_title(); ?>">
                <?php else : ?>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/placeholder.png"
                         class="img-fluid rounded shadow-sm"
                         alt="No Image">
                <?php endif; ?>
            </div>
            <!-- Book Details -->
            <div class="col-12 col-md-8">
                <h1 class="display-5 mb-3"><?php the_title(); ?></h1>
                <p class="mb-2"><strong><?php _e('Genre:', 'tt5-child'); ?></strong>
                    <?php
                    if ( $genres && ! is_wp_error( $genres ) ) {
                        $genre_names = wp_list_pluck( $genres, 'name' );
                        echo esc_html( implode( ', ', $genre_names ) );
                    } else {
                        echo 'N/A';
                    }
                    ?>
                </p>
                <p class="mb-3"><strong><?php _e('Publication Date:', 'tt5-child'); ?></strong>
                    <?php echo get_the_date(); ?>
                </p>
                <div class="book-content">
                    <?php the_excerpt(); ?>
                </div>
            </div>
        </div>
        <!-- Other Books -->
        <h2 class="mb-4"><?php _e('Other Books', 'tt5-child'); ?></h2>
        <div id="other-books" class="row g-4"></div>
    <?php endwhile; endif; ?>
</div>
<?php get_footer(); ?>
