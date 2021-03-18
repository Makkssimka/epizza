<?php 
    /** -----Список акций-----
     * 
     * идентификатор на один больше пердыдущего
     * промокод
     * процент
     * время первый элемнт со скольки второй до скольки
     * правила тут все сложно на пальцах не объяснить
     * 
     */

    $promocode = [
        [
            'id'        => 1,
            'promocode' => 'обед',
            'procent'   => 30,
            'time'      => [
                'from'  => 11,
                'to'    => 15
            ],
            'rules'     => ''
        ],
        [
            'id'        => 2,
            'promocode' => 'день',
            'procent'   => 25,
            'time'      => [
                'from'  => 0,
                'to'    => 23
            ],
            'rules'     => ''
        ],
        [
            'id'        => 3,
            'promocode' => 'май20',
            'procent'   => 20,
            'time'      => [
                'from'  => 0,
                'to'    => 23
            ],
            'rules'     => '(1lb|1lt|2lb|2lt|3lt|3lb).*(1lb|1lt|2lb|2lt|3lt|3lb).*(1lb|1lt|2lb|2lt|3lt|3lb)',
            'rulesSale' => 680
        ]
    ];

    header('Access-Control-Allow-Origin: *');
    echo json_encode($promocode);
?>