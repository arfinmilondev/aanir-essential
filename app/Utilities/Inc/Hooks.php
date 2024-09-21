<?php

/*************************************
/*******  Theme svg file support  ********
 **************************************/

use Elementor\Core\Admin\UI\Components\Button;

if (!function_exists('aanir_mime_types')) {

    function aanir_mime_types($mimes)
    {
        $mimes['svg'] = 'image/svg+xml';
        return $mimes;
    }
}

add_filter('upload_mimes', 'aanir_mime_types');
/*************************************
/*******  Contact Form 7 Auto p  ********
 **************************************/
add_filter('wpcf7_autop_or_not', '__return_false');

function aanir_essential_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

add_filter('upload_mimes', 'aanir_essential_mime_types');

// Use a quality setting of 75 for WebP images.
function aanir__webp__quality($quality, $mime_type)
{

    $qty = 75;

    if ('image/webp' === $mime_type) {
        return $qty;
    }
    return $quality;
}

add_filter('wp_editor_set_quality', 'aanir__webp__quality', 10, 2);



add_filter('locale', function ($lang) {

    global $wp_locale;

    if (is_admin()) {
        return $lang;
    }

    $key = 'enable_rtl';
    if (class_exists('CSF')) {
        $options = get_post_meta(get_the_ID(), 'aanir_page_options', true);
        $data = isset($options[$key]) ? $options[$key] : false;
        $rtl_language = isset($options['rtl_language']) ? $options['rtl_language'] : 'ar';
    }
    if ($data) {

        $wp_locale->text_direction = 'rtl';
        return $rtl_language == '' ? 'ar' : $rtl_language;
    }
    return $lang;
});

add_action('wp_body_open', function () {

    if (!aanir_option('enable_scroll_top')) {
        return;
    }
?>

    <style>
        .er-qs-randon-button-back {
            display: inline-block;
            background-color: #ff9776;
            width: 50px;
            height: 50px;
            text-align: center;
            border-radius: 4px;
            position: fixed;
            bottom: 30px;
            right: 30px;
            transition: background-color .3s,
                opacity .5s, visibility .5s;
            opacity: 0;
            visibility: hidden;
            z-index: 1000;
        }

        .er-qs-randon-button-back::after {
            content: "\f106";
            font-family: 'Font Awesome 5 Pro';
            font-weight: normal;
            font-style: normal;
            font-size: 2em;
            line-height: 50px;
            color: #fff;
        }

        .er-qs-randon-button-back:hover {
            cursor: pointer;
            background-color: #333;
        }

        .er-qs-randon-button-back:active {
            background-color: #555;
        }

        .er-qs-randon-button-back.show {
            opacity: 1;
            visibility: visible;
        }
    </style>

    <a class="er-qs-randon-button-back" id="er-qs-randon-button-back"></a>
<?php
}, 20);
