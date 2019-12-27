<?php
    $authorURL = get_the_author_meta('url', intval($author));
    if(empty($authorURL)){
        $authorURL = 'https://sosa.net';
    }

    wp_redirect($authorURL, '301');
    
    