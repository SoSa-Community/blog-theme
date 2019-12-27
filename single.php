<?php get_header(); ?>


    <div id="post_container" class="row">
        
            <div class="col-12 col-md-8 col-lg-9">
                <?php
                if(have_posts()){
                    while(have_posts()){
                        the_post();
                        
                        $categories = [];
                        $theCategories = array();
                        foreach(get_the_category() as $theCategory){
                            if($theCategory->cat_ID > 1){
                                $theCategories[] = $theCategory;
                            }
                        }
                        
                        if(!empty($theCategories)){
                            foreach($theCategories as $category){
                                $categories[] = '<a href="' . get_category_link($category->term_id) . '" title="' . sprintf(__('View all posts in %s'), $category->name) . '">' . $category->name . '</a>';
                            }
                        }

                        $tags = [];
                        foreach(get_the_tags() as $tag){
	                        $tags[] = '<a href="' . get_tag_link($tag->term_id) . '" title="' . sprintf(__('View all posts in %s'), $tag->name) . '">' . $tag->name . '</a>';
                        }
                        
                        $featuredImage = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full')[0];
                        ?>
                        <div class="post-featured-image" <?php if(!empty($featuredImage)){echo 'style="background-image: url(\'' . $featuredImage . '\');"';} ?>>
                            <div class="post-featured-image-overlay"></div>

                            <h1 class="post-featured-image-title text-center d-block d-md-none p-3"><?php echo get_the_title(); ?></h1>
                            <div class="post-featured-image-bottom">
                                <h2 class="post-featured-image-title d-none d-md-block"><?php echo get_the_title(); ?></h2>
                                <div class="post-featured-image-details">
                                    <div class="d-block">
                                        <span class="dashicons dashicons-category"></span> <?php echo implode(', ',$categories); ?>
                                    </div>
                                    <div class="d-block">
                                        <span class="dashicons dashicons-tag"></span> <?php echo implode(', ',$tags); ?>
                                    </div>
                                    <div class="d-block mt-1">
                                        <span class="dashicons dashicons-clock"></span> <span><?php echo get_the_time('F jS, Y'); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="post_content" class="p-3">
                            <?php   the_content();  ?>
                        </div>
                        <?php
                        SoSa::postNav();
                            // If comments are open or we have at least one comment, load up the comment template.
                        if ( comments_open() || get_comments_number() ){
                            ?>
                            <div id="post_comments" class="mt-4">
                                <h2>Comments</h2>
                                <div id="post_comments_inner" class=" rounded p-4">
                            <?php
                            comments_template();
                            ?>  </div>
                            </div>
                <?php   }
                    }
                } else {
                    include(locate_template('templates/content_none.php'));
                }
                
                ?>
            </div>
            <div class="col-12 col-md-4 col-lg-3">
                <?php
                    get_sidebar('left_post');
                ?>
            </div>
        
    </div>
</div>

<?php get_footer(); ?>
