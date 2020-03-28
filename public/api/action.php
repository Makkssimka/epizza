<?php 
    /** -----Список акций-----
     * 
     * идентификатор на один больше пердыдущего
     * назваие
     * описание
     * картинки, full для десктопной версии сайта, mobile - для мобильной
     * 
     */
    $action = [
        [
            'id' => 1,
            'title' => 'Две бутылочки Coca-Cola по суперцене',
            'description' => 'Классическая и без сахара по 0,5 литров. Просто добавьте напитки в корзину. Акция действует при заказе на доставку и самовывоз. Не действует с Додо Комбо и при добавлении дополнительных ингредиентов.',
            'images' => [
                'full' => '/images/slide1.jpeg',
                'mobile' => '/images/slide1-min.jpeg'
            ]
        ],
        [
            'id' => 2,
            'title' => 'Большая пицца на самовывоз по суперцене',
            'description' => 'Большая пицца 35 см за 449 рублей. Акция действует на самовывоз и в ресторане, но не действует на доставку и при добавлении дополнительных ингредиентов. Участвуют пиццы «Пепперони Фреш с томатами», «Пепперони Фреш с перцем», «Кисло-сладкий цыплёнок», «Сырная», «Ветчина и сыр».',
            'images' => [
                'full' => '/images/slide2.jpeg',
                'mobile' => '/images/slide2-min.jpeg'
            ]
        ],
        [
            'id' => 3,
            'title' => 'Три бутылочки Coca-Cola по суперцене',
            'description' => 'Две классические и одна без сахара по 0,5 литров. Просто добавьте напитки в корзину. Акция действует при заказе на доставку и самовывоз. Не действует с Додо Комбо и при добавлении дополнительных ингредиентов.',
            'images' => [
                'full' => '/images/slide3.jpeg',
                'mobile' => '/images/slide3-min.jpeg'
            ]
        ],
        [
            'id' => 4,
            'title' => 'Две бутылочки Coca-Cola по суперцене',
            'description' => 'Классическая и без сахара по 0,5 литров. Просто добавьте напитки в корзину. Акция действует при заказе на доставку и самовывоз. Не действует с Додо Комбо и при добавлении дополнительных ингредиентов.',
            'images' => [
                'full' => '/images/slide1.jpeg',
                'mobile' => '/images/slide1-min.jpeg'
            ]
        ],
        [
            'id' => 5,
            'title' => 'Большая пицца на самовывоз по суперцене',
            'description' => 'Большая пицца 35 см за 449 рублей. Акция действует на самовывоз и в ресторане, но не действует на доставку и при добавлении дополнительных ингредиентов. Участвуют пиццы «Пепперони Фреш с томатами», «Пепперони Фреш с перцем», «Кисло-сладкий цыплёнок», «Сырная», «Ветчина и сыр».',
            'images' => [
                'full' => '/images/slide2.jpeg',
                'mobile' => '/images/slide2-min.jpeg'
            ]
        ],
        [
            'id' => 6,
            'title' => 'Три бутылочки Coca-Cola по суперцене',
            'description' => 'Две классические и одна без сахара по 0,5 литров. Просто добавьте напитки в корзину. Акция действует при заказе на доставку и самовывоз. Не действует с Додо Комбо и при добавлении дополнительных ингредиентов.',
            'images' => [
                'full' => '/images/slide3.jpeg',
                'mobile' => '/images/slide3-min.jpeg'
            ]
        ],
    ];

    header('Access-Control-Allow-Origin: *');
    echo json_encode($action);
 ?>