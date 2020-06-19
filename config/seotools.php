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
            'description'  => 'starwhisper is a clothing store that provides mens clothing that can be used by women too. The advantages of Starwhisper are that it uses the best cotton, has its own brand name, and has a very luxurious and elegant design.', // set false to total remove
            'separator'    => false,
            'keywords'     => ['clothing store, mens clothing, clothing brand, designer clothes, brand name, clothes, apparel, starwhisper, jual kaos terbaik'],
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
            'title'       => 'starwhisper.', // set false to total remove
            'description' => 'starwhisper is a clothing store that provides mens clothing that can be used by women too. The advantages of Starwhisper are that it uses the best cotton, has its own brand name, and has a very luxurious and elegant design.', // set false to total remove
            'url'         => null, // Set null for using Url::current(), set false to total remove
            'type'        => false,
            'site_name'   => 'starwhisper',
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
            'title'       => 'starwhisper.', // set false to total remove
            'description' => 'starwhisper is a clothing store that provides mens clothing that can be used by women too. The advantages of Starwhisper are that it uses the best cotton, has its own brand name, and has a very luxurious and elegant design.', // set false to total remove
            'url'         => false, // Set null for using Url::current(), set false to total remove
            'type'        => 'WebPage',
            'images'      => ['https://res.cloudinary.com/starwhisper/image/upload/v1565405773/web/navbarlogo_s1re4h.png'],
        ],
    ],
];
