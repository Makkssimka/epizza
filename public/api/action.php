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
            'title' => '',
            'description' => '',
            'images' => [
                'full' => '/images/TriPiz.png',
                'mobile' => '/images/TriPizz_mii.png'
            ]
        ],
        [
            'id' => 2,
            'title' => '',
            'description' => '',
            'images' => [
                'full' => '/images/Obed.png',
                'mobile' => '/images/Obed_mini.png'
            ]
        ],
        [
            'id' => 3,
            'title' => '',
            'description' => '',
            'images' => [
                'full' => '/images/DR.png',
                'mobile' => '/images/DR_mini.png'
            ]
        ],
        [
            'id' => 4,
            'title' => '',
            'description' => '',
            'images' => [
                'full' => '/images/Samovyvoz_11.png',
                'mobile' => '/images/Samovyvoz_11_mini.png'
            ]
        ],
        [
            'id' => 5,
            'title' => '',
            'description' => '',
            'images' => [
                'full' => '/images/epizza1.png',
                'mobile' => '/images/epizza1.png'
            ]
        ],
        [
            'id' => 6,
            'title' => '',
            'description' => '',
            'images' => [
                'full' => '/images/epizza1.png',
                'mobile' => '/images/epizza1.png'
            ]
        ],
    ];

    header('Access-Control-Allow-Origin: *');
    echo json_encode($action);
 ?>