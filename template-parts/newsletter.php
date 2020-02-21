<div class="newsletter">
    <form class="newsletter_input-group" action="https://netlify.us4.list-manage.com/subscribe/post?u=<?php echo get_theme_mod('mailchimp_user'); ?>&id=<?php echo get_theme_mod('mailchimp_audience'); ?>" method="POST" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
        <input class="newsletter_input-group-field" type="email" placeholder="<?php _e('Assine nossa newsletter_', 'ericsonscorsim'); ?>" required name="EMAIL" id="mailchimp_email">
        <div id="mce-responses" class="clear">
            <div class="response" id="mce-error-response" style="display:none"></div>
            <div class="response" id="mce-success-response" style="display:none"></div>
        </div> <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
        <button type="submit" name="subscribe" id="mc-embedded-subscribe" class="newsletter_button"><i class="fas fa-angle-right"></i></button>
    </form>
</div>

<!--End mc_embed_signup-->