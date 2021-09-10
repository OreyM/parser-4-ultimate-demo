<?php

return [
    'parser_links' => [
        [
            'startLink'  => 'https://reco-public.rec.mp.microsoft.com/channels/Reco/V8.0/Lists/Computed/TopPaid?',
            'finishLink' => '&ItemTypes=Game&deviceFamily=Windows.Xbox&count=2000&skipitems=',
        ],
        [
            'startLink'  => 'https://reco-public.rec.mp.microsoft.com/channels/Reco/V8.0/Lists/Computed/New?',
            'finishLink' => '&ItemTypes=Game&deviceFamily=Windows.Xbox&count=2000&skipitems=',
        ],
        [
            'startLink'  => 'https://reco-public.rec.mp.microsoft.com/channels/Reco/V8.0/Lists/Computed/TopFree?',
            'finishLink' => '&ItemTypes=Game&deviceFamily=Windows.Xbox&count=2000&skipitems=',
        ],
        [
            'startLink'  => 'https://reco-public.rec.mp.microsoft.com/channels/Reco/V8.0/Lists/Computed/BestRated?',
            'finishLink' => '&ItemTypes=Game&deviceFamily=Windows.Xbox&count=2000&skipitems=',
        ],
        [
            'startLink'  => 'https://reco-public.rec.mp.microsoft.com/channels/Reco/V8.0/Lists/Computed/Deal?',
            'finishLink' => '&ItemTypes=Game&deviceFamily=Windows.Xbox&count=2000&skipitems=',
        ],
    ],

    'parser_game_link' => [
        'startLink'  => 'https://displaycatalog.mp.microsoft.com/v7.0/products?bigIds=',
        'finishLink' => '&MS-CV=DGU1mcuYo0WMMp+F.1',
    ],

    'regions' => [
        'ru' => [
            'region'   => 'Russia',
            'code'     => 'ru',
            'language' => 'ru',
            'market'   => 'ru-ru',
            'gamesId'  => 'Market=ru&Language=ru',
            'games'    => '&market=RU&languages=ru-ru'
        ],
        'ar' => [
            'region'   => 'Argentina',
            'code'     => 'ar',
            'language' => 'es',
            'market'   => 'es-ar',
            'gamesId'  => 'Market=ar&Language=es',
            'games'    => '&market=AR&languages=es-ar'
        ],
        'tr' => [
            'region'   => 'Turkey',
            'code'     => 'tr',
            'language' => 'tr',
            'market'   => 'tr-tr',
            'gamesId'  => 'Market=tr&Language=tr',
            'games'    => '&market=TR&languages=tr-tr'
        ],
        'in' => [
            'region'   => 'India',
            'code'     => 'in',
            'language' => 'en',
            'market'   => 'en-in',
            'gamesId'  => 'Market=in&Language=en',
            'games'    => '&market=IN&languages=en-in'
        ],
        'za' => [
            'region'   => 'South Africa',
            'code'     => 'za',
            'language' => 'en',
            'market'   => 'en-za',
            'gamesId'  => 'Market=za&Language=en',
            'games'    => '&market=ZA&languages=en-za'
        ],
        'co' => [
            'region'   => 'Colombia',
            'code'     => 'co',
            'language' => 'es',
            'market'   => 'es-co',
            'gamesId'  => 'Market=co&Language=es',
            'games'    => '&market=CO&languages=es-co'
        ],
    ]
];
