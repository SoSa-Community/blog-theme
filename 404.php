<?php
    get_header();
    $title = function(){echo __('The princess you\'re looking for is in another castle');};
?>
    <div id="post_container" class="row">
        <div class="col-12 col-md-8 col-lg-9">
			<div class="post-featured-image" id="image404">
            <div class="post-featured-image-overlay"></div>

            <h1 class="post-featured-image-title text-center d-block d-md-none p-3"><?php $title(); ?></h1>
            <div class="post-featured-image-bottom">
                <h2 class="post-featured-image-title d-none d-md-block"><?php $title(); ?></h2>
            </div>
        </div>

        <div id="post_content" class="p-3">
            <p>
		        <?php echo __('Sorry, we tried our best but couldn\'t find the page you were looking for.'); ?>
            </p>
            <p>
                <?php echo __('You can learn more about <a href="https://sosa.net">SoSa</a> '); ?>
		        <?php echo __('by visiting <a href="https://sosa.net">https://sosa.net</a> or check out some other great posts on this page!'); ?>
            </p>
        </div>
    </div>
    <div class="col-12 col-md-4 col-lg-3">
		<?php   get_sidebar('left_post');   ?>
    </div>
</div>


<?php get_footer(); ?>
