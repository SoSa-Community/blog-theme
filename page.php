<?php
/*
	Template Name: Default Page
	Description: The default page template
*/
?>
<?php   get_header();   ?>
<div id="post_container" class="row">
    <div class="col-12 col-md-8 col-lg-9">
        <div class="post-featured-image">
            <div class="post-featured-image-overlay"></div>

            <h1 class="post-featured-image-title text-center d-block d-md-none p-3"><?php the_title(); ?></h1>
            <div class="post-featured-image-bottom">
                <h2 class="post-featured-image-title d-none d-md-block"><?php the_title(); ?></h2>
            </div>
        </div>

        <div id="post_content" class="p-3">
			<?php the_content(); ?>
        </div>
    </div>
    <div class="col-12 col-md-4 col-lg-3">
		<?php   get_sidebar('left_post');   ?>
    </div>
</div>