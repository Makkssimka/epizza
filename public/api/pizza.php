<?php 

class Item{
    private $item = [];

    function __construct($id, $title, $price, $structure, $weight, $image, $images){
        $this->item['id'] = $id;
        $this->item['title'] = $title;
        $this->item['price'] = $price;
        $this->item['structure'] = $structure;
        $this->item['weight'] = $weight;
        $this->item['image'] = $image;
        $this->item['images'] = $images;
    }

    public function get(){
        return $this->item;
    }
}

class Pizza{
    private $pizza = [];

    public function add($item){
        array_push($this->pizza, $item); 
    }

    public function get(){
        return json_encode($this->pizza);
    }
}

$pizza = new Pizza();

/** -----Список пицц----- 
 * 
 * идентификатор (числа по порядку) 
 * название
 * цена ( s,m,l - размеры, b,t - толщина) sb - маленькая толстая, mt - средняя тонкая
 * состав 
 * изображение адрес
 * изображения пиццы разной толшины
 * 
*/

$pizzaArray = [
    new Item(
        1,
        'Пепперони с томатами',
        ['mb' => 515, 'mt' => 515,'lb' => 685, 'lt' => 685],
        ['Пикантная пепперони', 'томатный соус', 'моцарелла', 'томаты'],
        ['mb' => 590, 'mt' => 490,'lb' => 820, 'lt' => 700],
        '/images/pizza/piper-bold.jpeg',
        [
            'bold' => '/images/pizza/piper-bold.jpeg',
            'thin' => '/images/pizza/piper-thin.jpeg'
        ]
    ),
    new Item(
        2,
        'Пепперони с томатами',
        ['mb' => 515, 'mt' => 515,'lb' => 685, 'lt' => 685],
        ['томатный соус', 'моцарелла', 'томаты'],
        ['mb' => 590, 'mt' => 490,'lb' => 820, 'lt' => 700],
        '/images/pizza/piper-bold.jpeg',
        [
            'bold' => '/images/pizza/piper-bold.jpeg',
            'thin' => '/images/pizza/piper-thin.jpeg'
        ]
    ),
    new Item(
        3,
        'Пепперони с томатами',
        ['mb' => 515, 'mt' => 515,'lb' => 685, 'lt' => 685],
        ['Пикантная пепперони', 'томатный соус', 'моцарелла', 'томаты', 'томатный соус', 'моцарелла', 'томаты'],
        ['mb' => 590, 'mt' => 490,'lb' => 820, 'lt' => 700],
        '/images/pizza/piper-bold.jpeg',
        [
            'bold' => '/images/pizza/piper-bold.jpeg',
            'thin' => '/images/pizza/piper-thin.jpeg'
        ]
    ),
    new Item(
        4,
        'Пепперони с томатами',
        ['mb' => 515, 'mt' => 515,'lb' => 685, 'lt' => 685],
        ['Пикантная пепперони', 'томатный соус', 'моцарелла', 'томаты'],
        ['mb' => 590, 'mt' => 490,'lb' => 820, 'lt' => 700],
        '/images/pizza/piper-bold.jpeg',
        [
            'bold' => '/images/pizza/piper-bold.jpeg',
            'thin' => '/images/pizza/piper-thin.jpeg'
        ]
    ),
    new Item(
        5,
        'Пепперони с томатами',
        ['mb' => 515, 'mt' => 515,'lb' => 685, 'lt' => 685],
        ['Пикантная пепперони', 'томатный соус', 'моцарелла', 'томаты'],
        ['mb' => 590, 'mt' => 490,'lb' => 820, 'lt' => 700],
        '/images/pizza/piper-bold.jpeg',
        [
            'bold' => '/images/pizza/piper-bold.jpeg',
            'thin' => '/images/pizza/piper-thin.jpeg'
        ]
    ),
    new Item(
        6,
        'Пепперони с томатами',
        ['mb' => 515, 'mt' => 515,'lb' => 685, 'lt' => 685],
        ['Пикантная пепперони', 'томатный соус', 'моцарелла', 'томаты'],
        ['mb' => 590, 'mt' => 490,'lb' => 820, 'lt' => 700],
        '/images/pizza/piper-bold.jpeg',
        [
            'bold' => '/images/pizza/piper-bold.jpeg',
            'thin' => '/images/pizza/piper-thin.jpeg'
        ]
    ),
    new Item(
        7,
        'Пепперони с томатами',
        ['mb' => 515, 'mt' => 515,'lb' => 685, 'lt' => 685],
        ['Пикантная пепперони', 'томатный соус', 'моцарелла', 'томаты', 'томатный соус', 'моцарелла', 'томаты', 'томатный соус', 'моцарелла', 'томаты'],
        ['mb' => 590, 'mt' => 490,'lb' => 820, 'lt' => 700],
        '/images/pizza/piper-bold.jpeg',
        [
            'bold' => '/images/pizza/piper-bold.jpeg',
            'thin' => '/images/pizza/piper-thin.jpeg'
        ]
    ),
    new Item(
        8,
        'Пепперони с томатами',
        ['mb' => 515, 'mt' => 515,'lb' => 685, 'lt' => 685],
        ['Пикантная пепперони', 'томатный соус', 'моцарелла', 'томаты'],
        ['mb' => 590, 'mt' => 490,'lb' => 820, 'lt' => 700],
        '/images/pizza/piper-bold.jpeg',
        [
            'bold' => '/images/pizza/piper-bold.jpeg',
            'thin' => '/images/pizza/piper-thin.jpeg'
        ]
    ),
    new Item(
        9,
        'Пепперони с томатами',
        ['mb' => 515, 'mt' => 515,'lb' => 685, 'lt' => 685],
        ['Пикантная пепперони', 'томатный соус', 'моцарелла', 'томаты'],
        ['mb' => 590, 'mt' => 490,'lb' => 820, 'lt' => 700],
        '/images/pizza/piper-bold.jpeg',
        [
            'bold' => '/images/pizza/piper-bold.jpeg',
            'thin' => '/images/pizza/piper-thin.jpeg'
        ]
    ),
    new Item(
        10,
        'Пепперони с томатами',
        ['mb' => 515, 'mt' => 515,'lb' => 685, 'lt' => 685],
        ['Пикантная пепперони', 'томатный соус', 'моцарелла', 'томаты'],
        ['mb' => 590, 'mt' => 490,'lb' => 820, 'lt' => 700],
        '/images/pizza/piper-bold.jpeg',
        [
            'bold' => '/images/pizza/piper-bold.jpeg',
            'thin' => '/images/pizza/piper-thin.jpeg'
        ]
    )
];

foreach($pizzaArray as $item){
    $pizza->add($item->get());
}

header('Access-Control-Allow-Origin: *');
echo $pizza->get();

?>