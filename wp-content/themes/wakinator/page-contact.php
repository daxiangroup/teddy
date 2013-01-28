<?php
    //wp_enqueue_script('googlemaps', 'http://maps.google.com/maps/api/js?sensor=false&amp;language=en', 'jquery', false, true);
    //wp_enqueue_script('gmap3', get_bloginfo('template_url').'/gmap3.min.js', 'googlemaps', false, true);

    //wp_enqueue_script('gmap3', 'http://maps.google.com/maps/api/js?sensor=false&amp;language=en', 'jquery', false, true);
?>

<?php get_header(); the_post(); ?>
         
        <div class="content-container">
            <h4><?php the_title(); ?></h4>

            <?php if (isset($_GET['se']) && $_GET['se'] == '1') { ?>
            <div class="alert alert-error">
                <h4>Submission Error</h4>
                We're sorry, there was an error submitting your request for contact. Please try again, or get in <a href="<?php echo site_url('/contact'); ?>">contact</a> with us.
            </div>
            <?php } ?>

            <form id="frm-contact" action="<?php echo get_bloginfo('url'); ?>/submit/contact.php" method="post">
            <?php wp_nonce_field('tw_contact'); ?>
            <div id="cntr-contact-form">
                <div class="field">
                    <label for="con-fullname">Full Name<span class="req">*</span></label>
                    <input name="con-fullname" id="con-fullname" type="text" class="required" data-label="Full Name" data-section="contact" />
                </div>
                <div class="field">
                    <label for="con-email">Email Address<span class="req">*</span></label>
                    <input name="con-email" id="con-email" type="text" class="required" data-label="Email Address" data-section="contact" />
                </div>
                <div class="field">
                    <label for="con-subject">Subject<span class="req">*</span></label>
                    <input name="con-subject" id="con-subject" type="text" class="required" data-label="Subject" data-section="contact" />
                </div>
                <div class="field">
                    <label for="con-message">Message<span class="req">*</span></label>
                    <textarea name="con-message" id="con-message" class="required" data-label="Message" data-section="contact"></textarea>
                </div>
                <div class="field">
                    <label></label>
                    <button class="btn btn-primary">Send</button>
                </div>
            </div>
            </form>
        </div><!-- #content -->
             
<?php get_footer(); ?>