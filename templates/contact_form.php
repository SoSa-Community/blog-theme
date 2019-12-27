<?php
/**
 * Template Name: Contact Form
 */
get_header();
?>

<div class="container-fluid mt-4" id="contact_form_container">
        <div class="row">
            <div class="col-6 mx-auto text-center">
                <div class="row">
                    <div class="col-6">
                        <h2><?php echo __('Get in touch'); ?></h2>
                        <div id="contact_form" class="p-4 text-left rounded">
                            <?php
                                echo do_shortcode('[contact-form-7 id="305" title="Contact form 1"]');
                            ?>
                        </div>
                    </div>
                    <div class="col-6">
                        <h2><?php echo __('Social Media'); ?></h2>
                        <?php   SoSa::socialMediaIcons('contactform_socialmedia_icons','',['p-0']);  ?>
                    </div>
                </div>
            </div>
        </div>
        <?php SoSa::pagingNav(); ?>
</div>

<?php get_footer(); ?>