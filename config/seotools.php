<?php

/**
 * @see https://github.com/artesaos/seotools
 */

return [
    'meta' => [
        /*
         * The default configurations to be used by the meta generator.
         */
        'defaults'       => [
            'title'        => false, // set false to total remove
            'titleBefore'  => false, // Put defaults.title before page title, like 'It's Over 9000! - Dashboard'
            'description'  => 'BTSA Logistics adalah Expedisi, EMKL, EMKU & Custom Clearance dan juga termasuk daftar perusahaan custom clearance di Indonesia. Berada di Jakarta, Medan, Surabaya, Semarang, Palembang, Pekan Baru, Bali,  Makasar dan Lombok.">
', // set false to total remove
            'separator'    => false,
            'keywords'     => ['PPJK, EMKL, Expedisi, Export-Import, Custom Clearance, BTSA, BTSA LOGISTICS, Bea Cukai Indonesia, Jasa Ekspedisi, Custom Clearance Indonesia, PPJK Indonesia, Daftar perusahaan Bea Cukai di Indonesia">
'],
            'canonical'    => null, // Set null for using Url::current(), set false to total remove
            'robots'       => 'all', // Set to 'all', 'none' or any combination of index/noindex and follow/nofollow
        ],
        /*
         * Webmaster tags are always added.
         */
        'webmaster_tags' => [
            'google'    => null,
            'bing'      => null,
            'alexa'     => null,
            'pinterest' => null,
            'yandex'    => null,
        ],
    ],
    'opengraph' => [
        /*
         * The default configurations to be used by the opengraph generator.
         */
        'defaults' => [
            'title'       => 'BTSA LOGISTICS', // set false to total remove
            'description' => 'BTSA Logistics adalah Expedisi, EMKL, EMKU & Custom Clearance dan juga termasuk daftar perusahaan custom clearance di Indonesia. Berada di Jakarta, Medan, Surabaya, Semarang, Palembang, Pekan Baru, Bali,  Makasar dan Lombok.">
', // set false to total remove
            'url'         => null, // Set null for using Url::current(), set false to total remove
            'type'        => false,
            'site_name'   => 'btsa logistics',
            'images'      => ['https://res.cloudinary.com/starwhisper/image/upload/v1565405773/web/navbarlogo_s1re4h.png'],
        ],
    ],
    'twitter' => [
        /*
         * The default values to be used by the twitter cards generator.
         */
        'defaults' => [
            //'card'        => 'summary',
            //'site'        => '@LuizVinicius73',
        ],
    ],
    'json-ld' => [
        /*
         * The default configurations to be used by the json-ld generator.
         */
        'defaults' => [
            'title'       => 'BTSA LOGISTICS', // set false to total remove
            'description' => 'BTSA Logistics adalah Expedisi, EMKL, EMKU & Custom Clearance dan juga termasuk daftar perusahaan custom clearance di Indonesia. Berada di Jakarta, Medan, Surabaya, Semarang, Palembang, Pekan Baru, Bali,  Makasar dan Lombok.">
', // set false to total remove
            'url'         => false, // Set null for using Url::current(), set false to total remove
            'type'        => 'WebPage',
            'images'      => ['https://res.cloudinary.com/starwhisper/image/upload/v1565405773/web/navbarlogo_s1re4h.png'],
        ],
    ],
];
