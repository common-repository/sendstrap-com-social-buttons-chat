<?php

add_action('wp_enqueue_scripts', 'sendstrap_enqueue_parent_theme_style', 99);

function sendstrap_enqueue_parent_theme_style() {
    $sendstrap_options = get_option('sendstrap_settings');
    if (isset($sendstrap_options['enable']) && isset($sendstrap_options['id']) && isset($sendstrap_options['key']) && !(is_page(array($sendstrap_options['pageid'])))) {
        wp_enqueue_script('script-sendstrap', 'https://app.sendstrap.com/scripts/js/social_button.js?id=' . $sendstrap_options['id'] . '&key=' . $sendstrap_options['key'], array(), null, true);
    }
}
