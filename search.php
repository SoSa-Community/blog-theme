<?php get_header(); ?>

<div class="container-fluid mt-4">
    <h2>Results for: <?php the_search_query(); ?> </h2>
	<?php SoSa::showPostHandler(); ?>
</div>

<?php get_footer(); ?>