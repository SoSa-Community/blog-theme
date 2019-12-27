<?php
	$featuredImage = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'thumbnail')[0];
	$title = get_the_title();
	$excerpt = preg_replace('~^(\s*(?:&nbsp;)?)*~i', '', wp_trim_words(get_the_excerpt(), 55, ''));
	
?>
<div class="col-12 col-md-4 col-lg-3">
	<div class="card mb-3 post-card">
		<img src="<?php echo $featuredImage; ?>" class="card-img-top" alt="<?php echo $title; ?>">
		<div class="card-body">
			<p class="card-text-small"><?php echo get_the_time('F jS, Y'); ?> by <?php echo get_the_author_link(); ?></a></p>
			<h5 class="card-title"><a href="<?php echo get_permalink(get_the_ID()); ?>"><?php echo $title; ?></a></h5>
			<div class="card-text">
				<p><?php echo $excerpt; ?></p>
				<p class="post-block-read-more"><a href="<?php echo get_permalink(get_the_ID()); ?>"><?php echo __('Read Full Post'); ?></a></p>
			</div>
		</div>
		
	</div>
</div>