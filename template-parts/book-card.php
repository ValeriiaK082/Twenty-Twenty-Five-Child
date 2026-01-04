<?php
// Template part for displaying a single book in  list

$book_id = get_the_ID();
$book_post = get_post( $book_id );
$genres = get_the_terms( $book_id, 'book_genre' );
?>
<div class="col-md-4 mb-4">
    <div class="card h-100 shadow-sm">
        <div class="card-body d-flex flex-column">
            <h5 class="card-title">
                <a href="<?php echo esc_url( get_permalink( $book_id ) ); ?>" class="stretched-link text-decoration-none">
                    <?php echo get_the_title( $book_id ); ?>
                </a>
            </h5>
            <p class="card-text mb-1"><strong><?php _e('Publication Date:', 'tt5-child'); ?></strong> <?php echo get_the_date( 'F j, Y', $book_id ); ?></p>
            <p class="card-text mb-2"><strong><?php _e('Genre:', 'tt5-child'); ?></strong> <?php echo $genres ? esc_html( $genres[0]->name ) : 'N/A'; ?></p>
            <p class="card-text"><?php echo get_the_excerpt( $book_id ); ?></p>
        </div>
    </div>
</div>
