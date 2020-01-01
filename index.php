<?php
add_filter( 'wpseo_title', function ( $replaceValues ) {
    return "Blog | SoSa";
}, 10, 1 );
get_header();

?>

<div class="container-fluid mt-4">
	<?php SoSa::showPostHandler(); ?>
</div>

<?php get_footer(); ?>