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
    new Item(1, 'Соус сырный Heinz', 12, ['25 мл'], '/images/product/sirnii-sous.jpg'),
    new Item(2, 'Соус барбекю Heinz', 12, ['25 мл'], '/images/product/barbeku-sous.jpg'),
    new Item(3, 'Соус чесночный Heinz', 12, ['25 мл'], '/images/product/hesnoch-sous.jpg'),
    new Item(4, 'Соус томатный Heinz', 12, ['25 мл'], '/images/product/tomat-sous.jpg')
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
    new Item(1, 'Картофель фри', 50, ['90 гр'], '/images/product/free.jpg'),
    new Item(2, 'Картофельные дольки', 50, ['90 гр'], '/images/product/dolki.jpg'),
    new Item(3, 'Наггетсы', 350, ['10 шт'], '/images/product/nagetsi.jpg')
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
    new Item(1, 'Салат Греческий', 189, ['Салат айсберг', 'томаты черри', 'маслины', 'сладкий перец', 'свежий огурец', 'кубики брынзы', 'итальянские травы', 'оливковое масло'], '/images/product/sault-greth.jpg'),
    new Item(2, 'Салат Греческий', 189, ['Салат айсберг', 'томаты черри', 'маслины', 'сладкий перец', 'свежий огурец', 'кубики брынзы', 'итальянские травы', 'оливковое масло'], '/images/product/sault-greth.jpg'),
    new Item(3, 'Салат Греческий', 189, ['Салат айсберг', 'томаты черри', 'маслины', 'сладкий перец', 'свежий огурец', 'кубики брынзы', 'итальянские травы', 'оливковое масло'], '/images/product/sault-greth.jpg'),
    new Item(4, 'Салат Греческий', 189, ['Салат айсберг', 'томаты черри', 'маслины', 'сладкий перец', 'свежий огурец', 'кубики брынзы', 'итальянские травы', 'оливковое масло'], '/images/product/sault-greth.jpg'),
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
    new Item(1, 'Coca-Cola в бутылке 0.5 л', 60, [], '/images/product/coca-cola.jpg'),
    new Item(2, 'Coca-Cola в бутылке 0.9 л', 80, [], '/images/product/coca-cola.jpg'),
    new Item(3, 'Fanta в бутылке 0.5 л', 60, [], '/images/product/fanta.jpg'),
    new Item(4, 'Fanta в бутылке 0.9 л', 80, [], '/images/product/fanta.jpg'),
    new Item(5, 'Sprite в бутылке 0.5 л', 60, [], '/images/product/sprite.jpg'),
    new Item(6, 'Sprite в бутылке 0.9 л', 80, [], '/images/product/sprite.jpg'),
    new Item(7, 'Сок яблочный 0.2 л', 30, [], '/images/product/soc_jabl_2.jpg'),
    new Item(8, 'Сок яблочный 1 л', 85, [], '/images/product/soc_jabl_1.jpg'),
    new Item(9, 'Сок апельсиновый 1 л', 85, [], '/images/product/soc_jabl_1.jpg'),
    new Item(10, 'Чай Fuzetea 0,5 л персик-роза', 60, [], '/images/product/tea_persic.jpg'),
    new Item(11, 'Чай Fuzetea 0,5 л лесные ягоды-гибискус', 60, [], '/images/product/tea_jagoda.jpg'),
    new Item(12, 'Чай Fuzetea 0,5 л лимон-лемонграсс', 60, [], '/images/product/tea_limon.jpg')
];

foreach($drink as $item){
    $products->add('drink', $item->get());
}


header('Access-Control-Allow-Origin: *');
echo $products->get();

?>