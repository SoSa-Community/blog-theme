<?php

if ( ! class_exists( 'navwalker' )) {
	require_once(get_template_directory() . '/inc/navwalker.php');
}

class SoSa {
    public static function init()
    {
	    register_nav_menu(
			    'menubar-pages',
			    'Pages displayed in the menubar of all pages'
	    );
	
	    register_nav_menu(
			    'footer-pagemap',
			    'Pagemap displayed in the footer of all pages'
	    );
	
	    register_nav_menu(
			    'header-menu-nav',
			    'Links displayed in the header menu of all pages'
	    );
	
	    register_sidebar(
			    array(
					    'name' => 'Left Sidebar(Single Post)',
					    'id' => 'left_post',
					    'description' => 'Sidebar displayed on the left hand side of single post content'
			    )
	    );
	
	    add_theme_support('post-thumbnails');
	    add_theme_support( 'title-tag' );
	
	    add_filter('the_content', function($content){
	     
		    $content = str_ireplace(
		                                [
		                                        'hello@socialsavanna.com',
                                                '"hello@chatplayshare.com"',
                                                'socialsavanna.com',
                                                'https://chatplayshare.com',
				                                'blog.chatplayshare.com'
                                        ],
                                        [
                                                'hello@chatplayshare.com',
                                                '"mailto:hello@chatplayshare.com"',
                                                'sosa.net',
                                                'https://sosa.net',
                                                'blog.sosa.net'
                                        ],
                                        $content
                    
                    );
		    return $content;
	    });
	    
	    remove_filter('get_the_excerpt', 'wp_trim_excerpt');
	    add_filter('get_the_excerpt', function($text){
		    $raw_excerpt = $text;
		
		    if(strlen($text) == 0){
			    $text = get_the_content();
			
			    $text = strip_shortcodes($text);
			
			    $text = apply_filters('the_content', $text);
			    $text = str_replace(']]>', ']]&gt;', $text);
			
			    $allowed_tags = '<p>,<a>,<em>,<strong>,<img>';
			    $text = strip_tags($text, $allowed_tags);
			
			    $excerpt_word_count = 55;
			    $excerpt_length = apply_filters('excerpt_length', $excerpt_word_count);
			
			    $excerpt_end = '... ';
			    $excerpt_more = apply_filters('excerpt_more', ' ' . $excerpt_end);
			
			    $words = preg_split('/[\n\r\t ]+/', $text, ($excerpt_length + 1), PREG_SPLIT_NO_EMPTY);
			    if(count($words) > $excerpt_length){
				    array_pop($words);
				    $text = implode(' ', $words);
				    $text = $text . $excerpt_more;
			    } else {
				    $text = implode(' ', $words);
			    }
		    }
		
		    return apply_filters('wp_trim_excerpt', $text, $raw_excerpt);
	    });
	
	    add_action( 'wp_enqueue_scripts', function(){
		    wp_enqueue_style( 'dashicons' );
		    wp_enqueue_style( 'bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' );
		    wp_enqueue_style( 'fontawesome-cdn', 'https://pro.fontawesome.com/releases/v5.12.0/css/all.css' );
		    wp_enqueue_style('material-design-font','https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css');
		    
		    
		    wp_enqueue_script('popper','https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js',[],'1.16.0',true);
		    wp_enqueue_script('bootstrap','https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js',[],'4.4.1',true);
      
	    });
    }
	
	public static function pagingNav(){
		if($GLOBALS['wp_query']->max_num_pages < 2){
			return;
		}
		
		$paged = get_query_var('paged') ? intval(get_query_var('paged')) : 1;
		$pagenum_link = html_entity_decode(get_pagenum_link());
		$query_args = array();
		$url_parts = explode('?', $pagenum_link);
		
		if(isset($url_parts[1])){
			wp_parse_str($url_parts[1], $query_args);
		}
		
		$pagenum_link = remove_query_arg(array_keys($query_args), $pagenum_link);
		$pagenum_link = trailingslashit($pagenum_link) . '%_%';
		
		$format = $GLOBALS['wp_rewrite']->using_index_permalinks() && !strpos($pagenum_link, 'index.php') ? 'index.php/' : '';
		$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit('page/%#%', 'paged') : '?paged=%#%';
		
		$links = paginate_links(
				array(
						'base' => $pagenum_link,
						'format' => $format,
						'total' => $GLOBALS['wp_query']->max_num_pages,
						'current' => $paged,
						'mid_size' => 3,
						'add_args' => array_map('urlencode', $query_args),
						'prev_text' => '&larr; Previous',
						'next_text' => 'Next &rarr;',
                        'type' => 'array'
				)
		);
		
		if($links){
			?>
                <div class="row">
                    <nav class="paging-container w-100">
                        <ul class="pagination justify-content-center">
                            <?php
                                foreach($links as $link){
                                    $active = '';
                                    if(preg_match('/aria-current=\'page\'/i',$link)) $active = ' active';
                                    ?>
                                    <li class="page-item<?php echo $active; ?>"><?php echo str_ireplace('page-numbers','page-numbers page-link',$link); ?></li>
                                    <?php
                                }
                            ?>
                        </ul>
                    </nav>
                </div>
			<?php
		}
	}
	
	public static function postNav(){
		$previous = (is_attachment()) ? get_post(get_post()->post_parent) : get_adjacent_post(false, '', true);
		$next = get_adjacent_post(false, '', false);
		
		if(!$next && !$previous){
			return;
		}
		
		?>
        <nav class="paging_container my-4">
            <div class="paging_content">
                <div class="paging_links clearfix">
					<?php
					if(is_attachment()){
						previous_post_link('%link', '&larr; <span class=\'meta-nav\'>Published In</span> \'%title\'');
					} else {
						previous_post_link('%link', '&larr; %title');
						//echo ' - ';
						next_post_link('%link', '%title &rarr;');
					}
					?>
                </div>
            </div>
        </nav>
		<?php
	}
	
	public static function socialMediaIcons($id=null, $textAtStart='', $classes=['text-center']){
        if(!empty($textAtStart)){
            $textAtStart = '<li class="d-inline d-xl-inline-block"><h5>Follow us:</h5></li>';
        }
        
        ?>
        <ul id="<?php echo $id; ?>" class='<?php echo implode(' ', $classes); ?>'>
            
            <?php echo $textAtStart; ?>
            <li>
                <a href="https://www.facebook.com/ChatPlayShare/" rel="nofollow noopener">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/fb_icon.svg" />
                </a>
            </li>
            <li>
                <a href="https://twitter.com/chatplayshare" rel="nofollow noopener">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/twitter_icon.svg" />
                </a>
            </li>
            <li>
                <a href="https://youtube.com/c/sosacommunity" rel="nofollow noopener">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/yt_icon.svg" />
                </a>
            </li>
            <li>
                <a href="https://www.linkedin.com/company/sosa-community/" rel="nofollow noopener">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/linkedin_icon.svg" />
                </a>
            </li>
        </ul>
        <?php
    }
    
    public static function showPostHandler(){
	    include(locate_template('templates/post_handler.php'));
    }
}

SoSa::init();
?>