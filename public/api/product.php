<?php
class Item{
    private $item = [];

    function __construct($id, $title, $price, $structure, $image){
        $this->item['id'] = $id;
        $this->item['title'] = $title;
        $this->item['price'] = $price;
        $this->item['structure'] = $structure;
        $this->item['image'] = $image;
    }

    public function get(){
        return $this->item;
    }
}

class Product{
    private $product = [
 
        "souse" => [],
        "zakuski" => [],
        "sault" => [],
        "drink" => []

    ];

    public function add($category, $item){
        array_push($this->product[$category], $item); 
    }

    public function get(){
        return json_encode($this->product);
    }
}

$products = new Product();

/** -----Список соусов-----
 *
 * идентификатор (числа по порядку) 
 * название
 * цена
 * состав (если есть, если нет, то [])
 * изображение адрес
 * 
*/

$souse = [
    new Item(201, 'Соус сырный Heinz', 20, ['25 мл'], '/images/product/sirnii-sous.jpg'),
    new Item(202, 'Соус барбекю Heinz', 20, ['25 мл'], '/images/product/barbeku-sous.jpg'),
    new Item(203, 'Соус чесночный Heinz', 20, ['25 мл'], '/images/product/hesnoch-sous.jpg'),
    new Item(204, 'Соус томатный Heinz', 20, ['25 мл'], '/images/product/tomat-sous.jpg'),
	new Item(205, 'Соус кисло-сладкий Heinz', 20, ['25 мл'], '/images/product/sousKS1.jpeg')
];

foreach($souse as $item){
    $products->add('souse', $item->get());
}

/** -----Список закусок----- 
 *
 * идентификатор (числа по порядку) 
 * название
 * цена
 * состав (если есть, если нет, то [])
 * изображение адрес
 * 
*/

$zakuski = [
    new Item(301, 'Картофелные дольки', 70, ['90 гр'], '/images/product/dolki991.jpeg'),
	new Item(302, 'Картофель фри', 65, ['90 гр'], '/images/product/free 99.jpg'),
	new Item(303, 'Картофель фри с беконом', 149, ['140 гр'], '/images/product/freBecon1.png'),
	new Item(304, 'Картофельные шарики', 160, ['200 гр'], '/images/product/sharika1.jpeg'),
	new Item(305, 'Сырные подушечки', 90, ['6 шт'], '/images/product/syrPodush1.png'),
	new Item(306, 'Луковые колечки', 120, ['10шт.'], '/images/product/lukKol.jpeg'),
];

foreach($zakuski as $item){
    $products->add('zakuski', $item->get());
}

/** -----Список салатов-----
 *
 * идентификатор (числа по порядку) 
 * название
 * цена
 * состав (если есть, если нет, то [])
 * изображение адрес
 * 
*/

$sault = [   
];

foreach($sault as $item){
    $products->add('sault', $item->get());
}

/** -----Список напитков----- 
 * 
 * идентификатор (числа по порядку) 
 * название
 * цена
 * состав (если есть, если нет, то [])
 * изображение адрес
 * 
*/

$drink = [
    new Item(101, 'Coca-Cola в бутылке 0.5 л', 80, [], '/images/product/coca-cola.jpg'),
    new Item(102, 'Coca-Cola в бутылке 0.9 л', 110, [], '/images/product/coca-cola.jpg'),
    new Item(103, 'Fanta в бутылке 0.5 л', 80, [], '/images/product/fanta.jpg'),
    new Item(104, 'Fanta в бутылке 0.9 л', 110, [], '/images/product/fanta.jpg'),
    new Item(105, 'Sprite в бутылке 0.5 л', 80, [], '/images/product/sprite.jpg'),
    new Item(106, 'Sprite в бутылке 0.9 л', 110, [], '/images/product/sprite.jpg'),
    new Item(107, 'Сок яблочный 0.2 л', 40, [], '/images/product/soc_jabl_2.jpg'),
    new Item(108, 'Сок яблочный 1 л', 119, [], '/images/product/soc_jabl_1.jpg'),
    new Item(109, 'Сок апельсиновый 1 л', 119, [], '/images/product/soc_apels.jpg'),
    new Item(110, 'Чай Fuzetea 0,5 л персик-роза', 80, [], '/images/product/tea_persic.jpg'),
    new Item(111, 'Чай Fuzetea 0,5 л лесные ягоды-гибискус', 80, [], '/images/product/tea_jagoda.jpg'),
    new Item(112, 'Чай Fuzetea 0,5 л лимон-лемонграсс', 80, [], '/images/product/tea_limon.jpg')
];

foreach($drink as $item){
    $products->add('drink', $item->get());
}


header('Access-Control-Allow-Origin: *');
echo $products->get();

?>