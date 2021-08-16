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
        'Пицца с ветчиной и грибами',
        ['mb' => 450, 'mt' => 450,'lb' => 590, 'lt' => 590],
        ['пицца-соус', 'сыр Моцарелла', 'шампиньоны', 'ветчина', 'зелень петрушки'],
		['mb' => 600, 'mt' => 550,'lb' => 850, 'lt' => 800],
        '/images/pizza/vetchinagriby_09.png',
        [
            'bold' => '/images/pizza/vetchinagriby_09.png',
            'thin' => '/images/pizza/vetchinagriby_09.png'
        ]
    ),
    new Item(
        2,
        'Пепперони',
        ['mb' => 440, 'mt' => 440,'lb' => 540, 'lt' => 540],
        ['пицца-соус', 'сыр Моцарелла', 'пепперони', 'зелень петрушки'],
		['mb' => 600, 'mt' => 550,'lb' => 750, 'lt' => 700],
        '/images/pizza/Peperoni_09.jpeg',
        [
            'bold' => '/images/pizza/Peperoni_09.jpeg',
            'thin' => '/images/pizza/Peperoni_09.jpeg'
        ]
    ),
    new Item(
        3,
        'Мясная',
        ['mb' => 470, 'mt' => 470,'lb' => 590, 'lt' => 590],
        ['фирменный соус', 'сыр Моцарелла', 'куриное филе', 'грудка куриная копченая', 'ветчина', 'маслины', 'помидоры черри'],
		['mb' => 600, 'mt' => 550,'lb' => 750, 'lt' => 700],
        '/images/pizza/Myasnaia_09.jpeg',
        [
            'bold' => '/images/pizza/Myasnaia_09.jpeg',
            'thin' => '/images/pizza/Myasnaia_09.jpeg'
        ]
    ),
    new Item(
        4,
        'Детская пицца',
        ['mb' => 350, 'mt' => 350,'lb' => 450, 'lt' => 450],
        ['пицца -соус', 'ветчина', 'сыр Моцарелла'],
		['mb' => 600, 'mt' => 540,'lb' => 700, 'lt' => 650],
        '/images/pizza/Detskaia_09.jpeg',
        [
            'bold' => '/images/pizza/Detskaia_09.jpeg',
            'thin' => '/images/pizza/Detskaia_09.jpeg'
        ]
    ),
    new Item(
        5,
        'Супер сырная',
        ['mb' => 460, 'mt' => 460,'lb' => 600, 'lt' => 600],
        ['сырный соус', 'сыр Моцарелла', 'сыр Гауда', 'сыр Чеддер', 'сыр Сметанковый', 'сыр с благородной плесенью'],
		['mb' => 600, 'mt' => 550,'lb' => 750, 'lt' => 700],
        '/images/pizza/Syrnaia09.jpeg',
        [
            'bold' => '/images/pizza/Syrnaia09.jpeg',
            'thin' => '/images/pizza/Syrnaia09.jpeg'
        ]
    ),
    new Item(
        6,
        'Гавайская',
        ['mb' => 400, 'mt' => 400,'lb' => 530, 'lt' => 530],
        ['пицца-соус', 'сыр Моцарелла', 'куриное филе', 'ананасы'],
		['mb' => 600, 'mt' => 550,'lb' => 800, 'lt' => 750],
        '/images/pizza/Gavayiskaia_09.jpeg',
        [
            'bold' => '/images/pizza/Gavayiskaia_09.jpeg',
            'thin' => '/images/pizza/Gavayiskaia_09.jpeg'
        ]
    ),
    new Item(
        7,
        'Ё пицца',
        ['mb' => 470, 'mt' => 470,'lb' => 600, 'lt' => 600],
        ['горчичный соус', 'горчица дижонская', 'баварские колбаски', 'маринованные огурчики', 'сыр Моцарелла'],
		['mb' => 650, 'mt' => 600,'lb' => 850, 'lt' => 800],
        '/images/pizza/Epizza_09.jpeg',
        [
            'bold' => '/images/pizza/Epizza_09.jpeg',
            'thin' => '/images/pizza/Epizza_09.jpeg'
        ]
    ),
    new Item(
        8,
        'Пицца дьявола',
        ['mb' => 420, 'mt' => 420,'lb' => 550, 'lt' => 550],
        ['пицца-соус', 'сыр Моцарелла', 'куриное филе', 'перец Халапеньо' ],
		['mb' => 650, 'mt' => 600,'lb' => 800, 'lt' => 750],
        '/images/pizza/Devil_09.jpeg',
        [
            'bold' => '/images/pizza/Devil_09.jpeg',
            'thin' => '/images/pizza/Devil_09.jpeg'
        ]
    ),
	new Item(
        9,
        'Пицца ВЕГА',
        ['mb' => 350, 'mt' => 350,'lb' => 470, 'lt' => 470],
        ['пицца-соус', 'сыр Моцарелла', 'цукини', 'шампиньоны', 'болгарский перец', 'свежие томаты', 'петрушка' ],
		['mb' => 550, 'mt' => 500,'lb' => 700, 'lt' => 650],
        '/images/pizza/Vega_09.jpeg',
        [
            'bold' => '/images/pizza/Vega_09.jpeg',
            'thin' => '/images/pizza/Vega_09.jpeg'
        ]
    ),
	new Item(
        10,
        'Пицца 4 Сезона',
        ['mb' => 480, 'mt' => 480,'lb' => 600, 'lt' => 600],
        ['пицца-соус', 'сыр Моцарелла', 'Пепперони', 'Маслины', 'Куриное филе', 'Копченая грудка', 'Баварские колбаски', 'Маринованные огурчики', 'Смесь сыров', 'петрушка', 'Дижонская горчица' ],
		['mb' => 550, 'mt' => 500,'lb' => 700, 'lt' => 650],
        '/images/pizza/4_cizon_09.jpeg',
        [
            'bold' => '/images/pizza/4_cizon_09.jpeg',
            'thin' => '/images/pizza/4_cizon_09.jpeg'
        ]
    ),
    new Item(
        11,
        'Классическая',
        ['mb' => 440, 'mt' => 440,'lb' => 540, 'lt' => 540],
        ['пицца-соус', 'сыр Моцарелла', 'сервелат', 'перец болгарский', 'помидоры черри'],
		['mb' => 600, 'mt' => 650,'lb' => 800, 'lt' => 750],
        '/images/pizza/Clasik_09.jpeg',
        [
            'bold' => '/images/pizza/Clasik_09.jpeg',
            'thin' => '/images/pizza/Clasik_09.jpeg'
        ]
    ),
	 new Item(
        12,
        'Пицца с семгой',
        ['mb' => 600, 'mt' => 600,'lb' => 720, 'lt' => 720],
        ['белый соус', 'сыр Моцарелла', 'помидоры черри', 'семга слабосоленая', 'руккола', 'икра красная имитированная'],
		['mb' => 550, 'mt' => 500,'lb' => 750, 'lt' => 700],
        '/images/pizza/semga_09.jpeg',
        [
            'bold' => '/images/pizza/semga_09.jpeg',
            'thin' => '/images/pizza/semga_09.jpeg'
        ]
    ),
	new Item(
        13,
        'Пицца «Цезарь»',
        ['mb' => 450, 'mt' => 450,'lb' => 580, 'lt' => 580],
        ['соус Цезарь', 'сыр Моцарелла', 'помидоры черри', 'филе куриное', 'лист салата', 'сухарики', 'сыр пармезан'],
		['mb' => 600, 'mt' => 600,'lb' => 650, 'lt' => 650],
        '/images/pizza/Cizar_09.jpeg',
        [
            'bold' => '/images/pizza/Cizar_09.jpeg',
            'thin' => '/images/pizza/Cizar_09.jpeg'
        ]
	),
	new Item(
        14,
        'Пицца «С грушей и горгонзолой»',
        ['mb' => 470, 'mt' => 470,'lb' => 570, 'lt' => 570],
        ['Белый соус', 'сыр Моцарелла', 'груша', 'горгонзола'],
		['mb' => 650, 'mt' => 600,'lb' => 700, 'lt' => 650],
        '/images/pizza/grush_09.jpeg',
        [
            'bold' => '/images/pizza/grush_09.jpeg',
            'thin' => '/images/pizza/grush_09.jpeg'
        ]
    ),
	new Item(
        15,
        'Пицца «Пицца Жульен»',
        ['mb' => 460, 'mt' => 460,'lb' => 590, 'lt' => 590],
        ['Белый соус', 'сыр Моцарелла', 'шампиньоны', 'куриное филе', 'сыр пармезан'],
		['mb' => 650, 'mt' => 600,'lb' => 750, 'lt' => 700],
        '/images/pizza/Zhulen_09.jpeg',
        [
            'bold' => '/images/pizza/Zhulen_09.jpeg',
            'thin' => '/images/pizza/Zhulen_09.jpeg'
        ]
    ),
	new Item(
        16,
        'Пицца «Пицца Маргарита»',
        ['mb' => 410, 'mt' => 410,'lb' => 510, 'lt' => 510],
        ['Пицца соус', 'увеличенная порция Моцареллы', 'томаты', 'итальянские травы'],
		['mb' => 650, 'mt' => 600,'lb' => 750, 'lt' => 700],
        '/images/pizza/margarita_09.jpeg',
        [
            'bold' => '/images/pizza/margarita_09.jpeg',
            'thin' => '/images/pizza/margarita_09.jpeg'
        ]
    ),
    new Item(
        17,
        'Фокачча с помидорами',
        ['mb' => 160, 'mt' => 160,'lb' => 160, 'lt' => 160],
        ['Тесто', 'масло оливковое', 'помидоры', 'чеснок', 'сыр моцарелла', 'зелень'],
		['mb' => 300, 'mt' => 300,'lb' => 300, 'lt' => 300],
        '/images/pizza/FokachTomat_09.jpeg',
        [
            'bold' => '/images/pizza/FokachTomat_09.jpeg',
            'thin' => '/images/pizza/FokachTomat_09.jpeg'
        ]
     ),
    new Item(
        18,
        'Фокачча с пармезаном',
        ['mb' => 150, 'mt' => 150,'lb' => 150, 'lt' => 150],
        ['Тесто', 'масло оливковое', 'чеснок', 'сыр пармезан', 'розмарин'],
		['mb' => 280, 'mt' => 280,'lb' => 280, 'lt' => 280],
        '/images/pizza/FokachParmez_09.jpeg',
        [
            'bold' => '/images/pizza/FokachParmez_09.jpeg',
            'thin' => '/images/pizza/FokachParmez_09.jpeg'
        ]
    )
];  
   
foreach($pizzaArray as $key => $item) {
    //Добавляем блок про бесплатную доставку
    if($key == 3){
        $pizza->add([
            "visibl" => true,
            "title" => "Бесплатная доставка пиццы от 599 рублей"
        ]);
    }
    $pizza->add($item->get());
}

header('Access-Control-Allow-Origin: *');
echo $pizza->get();

?>