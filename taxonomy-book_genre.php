<?php get_header(); ?>
<div class="container my-5">
    <h1 class="mb-4"><?php _e('Genre: ', 'tt5-child') . single_term_title(); ?></h1>
    <?php if (have_posts()) : ?>
        <div class="row g-4">
            <?php while (have_posts()) : the_post(); ?>
                <?php get_template_part('template-parts/book-card'); ?>
            <?php endwhile; ?>
        </div>
        <nav class="mt-5">
            <ul class="pagination justify-content-center">
                <?php
                the_posts_pagination(array(
                        'mid_size' => 2,
                        'prev_text' => __('« Prev'),
                        'next_text' => __('Next »'),
                ));
                ?>
            </ul>
        </nav>
    <?php else : ?>
        <p><?php _e('No books found in this genre. ', 'tt5-child'); ?></p>
    <?php endif; wp_reset_postdata(); ?>

</div>

<?php get_footer(); ?>
