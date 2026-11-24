<?php
/**
 * Application configuration
 */

return [
    'app' => [
        'name'     => 'Nasra School',
        'env'      => 'development',      // development | production
        'debug'    => true,               // set false in production
        'timezone' => 'Asia/Karachi',
        // Leave empty to auto-detect. Set e.g. 'https://nasraschool.edu.pk' in production
        // so canonical URLs and the sitemap always use the real domain.
        'url'      => '',
    ],

    // Defaults for <meta> tags and structured data (pages can override title/description/image)
    'seo' => [
        'title_suffix' => 'Nasra School | Education Trust Nasra School, Karachi',
        'description'  => 'Education Trust Nasra School (ETNS), founded in 1949 by Nasra Wazir Ali (S.I.), provides affordable high-quality English-medium education across five campuses in Karachi — bridging education and gender gaps.',
        'image'        => 'images/branding/logo-512.png',
        'locale'       => 'en_PK',
    ],

    'contact' => [
        'phone'   => '(92-21) 32361313-18',
        'tel'     => '+922132361313',
        'email'   => 'info@nasraschool.edu.pk',
        'street'  => '13, Modern Cooperative Housing Society, Block 7/8, Tipu Sultan Road',
        'city'    => 'Karachi',
        'country' => 'PK',
    ],

    'social' => [
        'facebook'  => 'https://www.facebook.com/people/ETNS-Education-Trust-Nasra-School/100063850159981/',
        'instagram' => 'https://www.instagram.com/nasraschools/',
        'youtube'   => 'https://www.youtube.com/channel/UCxLEtU78o1nbuMguIKi9pPg/featured',
        'whatsapp'  => 'https://wa.me/922132361313',
    ],

    // Homepage video — local file wins if present, else YouTube
    'video' => [
        'youtube_id' => '3G0XLEaSd2o', // from nasraschool.edu.pk
        'local'      => 'videos/campus.mp4',
        'poster'     => 'home/hero-banner.jpg',
    ],
];
