<?php get_header(); ?>

<div class="container-fluid mt-4">
        <div class="row">
			<h2>
                <?php if(is_day()){ ?>
                    <?php printf("Daily Archives: <span>%s</span>", get_the_date()); ?>
                <?php } else if(is_month()){ ?>
                    <?php printf("Monthly Archives: <span>%s</span>", get_the_date('F Y')); ?>
                <?php } else if(is_year()){ ?>
                    <?php printf("Yearly Archives: <span>%s</span>", get_the_date('Y')); ?>
                <?php } else { ?>
                    Blog Archives
                <?php } ?>
            </h2>
	        <?php SoSa::showPostHandler(); ?>
        </div>
</div>

<?php get_footer(); ?>