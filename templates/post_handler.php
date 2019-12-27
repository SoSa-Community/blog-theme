<?php

if(have_posts()){
	$count = 0;
	//include(locate_template("content-none.php"));
	?><div class="row"><?php
	while(have_posts()){
		the_post();
		include(locate_template('post-card.php'));
	}
	?></div><?php
	SoSa::pagingNav();
} else {
	include(locate_template('content-none.php'));
}