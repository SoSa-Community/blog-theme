<div class="single-post-sidebar-container">
	<div class="single-post-sidebar-content">
		<div class="single-post-sidebar-subscribe mb-4 mt-4 mt-md-0">
			<h5>Get updates when they happen!</h5>
			<div class="text-center pt-2">
				<?php
					$subscriptionForm = do_shortcode('[mailpoet_form id="2"]');
					$subscriptionForm = str_ireplace(
									[       'd."/></p>',
											'</label><p',
											'<p class="mailpoet_paragraph">',
											'</p>',
											'<div class="mailpoet_message">',
											'mailpoet_text',
											'mailpoet_submit',
											'mailpoet_text form-control_label'
									],
									[
											'd." placeholder="E-mail address"/></p>',
											'</label><div class=""><p',
											'<div class="mailpoet_paragraph">',
											'</div>',
											'</div><div class="mailpoet_message mt-2">',
											'mailpoet_text form-control',
											'mailpoet_submit btn btn-success w-100',
											'mailpoet_text form-control_label d-none'
									],
									$subscriptionForm
					);
					echo $subscriptionForm;
				?>
			</div>
		</div>
		
		<?php
	
    $queryArgs = array(
            'posts_per_page' => 6,
            'caller_get_posts' => 1
    );
    
	$postID = get_the_ID();
	if(!empty($postID)){
		$queryArgs['post__not_in'] = array($postID);
		
		$tags = wp_get_post_tags($postID);
		if(!empty($tags)) {
			$tagsIn = [];
			foreach ($tags as $tag) {
				$tagsIn[] = $tag->term_id;
			}
			$queryArgs['tag__in'] = $tagsIn;
		}else{
			$theCategories = array();
			foreach(get_the_category() as $theCategory){
				if($theCategory->cat_ID > 1){
					$theCategories[] = $theCategory->term_id;
				}
			}
			
			if(!empty($theCategories)) $queryArgs['category__in'] = $theCategories;
        }
    }
	
	
		
    $relatedPostsElement = '';
    $relatedPostIDs = array();
	
	$relatedQuery = new WP_Query($queryArgs);
    if($relatedQuery->have_posts()) {
    ?>
        <h5><?php echo __('Other Posts You\'ll Love'); ?></h5>
        <ul id="related_posts_list" class="mb-4">
    <?php
        while ($relatedQuery->have_posts()) {
            $relatedQuery->the_post();
            ?>
            <li>
                <a class="post-related-image mb-2" href="<?php the_permalink(); ?>">
                    <?php
                        $featuredImage = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'thumbnail')[0];
                        ?> <img src="<?php echo $featuredImage; ?>" />
                    
                    <div class="post-related-image-overlay"></div>
                    <span><?php   the_title();    ?></span>
                </a>
                
            </li>
            <?php
        }
    ?>
        </ul>
        
        <br />
        <?php   SoSa::socialMediaIcons('sidebar_socialmedia_icons', 'Follow us:');
	}
	?>
		</div>
	</div>
