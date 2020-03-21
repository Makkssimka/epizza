<?php 
    header('Access-Control-Allow-Origin: *');

    $data = json_decode($_POST['contact']);
    $basket = json_decode($_POST['basket']);

    $number = rand(10000, 99999);
    $todey = date('H:i');
    $calc = $data->сalculation?"под расчет":$data->pay." &#8381;";
    $total = 0;

    $message = "<body style='font-family: ProximaNova,-apple-system,BlinkMacSystemFont,\"Segoe UI\",Roboto,\"Helvetica Neue\",Arial,sans-serif; background-color: #dcdcdc'><div style='max-width: 700px; margin: 0 auto; background-color: #fff; padding: 20px'><div style='text-align: center'><h2 style='margin-top: 0;'>Новый заказ пиццы</h2><p style='margin: 8px 0'>Номер заказа: <span style='font-weight: bold; font-size: 1.2em;'>$number</span></p><p style='margin: 8px 0'>Время заказа: <span style='font-weight: bold; font-size: 1.2em;'>$todey</span></p>";

    $message .= $data->date_order?"<p style='margin: 8px 0'>Доставить ко времени: <span style='font-weight: bold; font-size: 1.2em;'>$data->date_order $data->time_order</span></p>":"";

    $message .= "</div><div style='margin-top: 15px; padding-top: 15px; border-top: 1px solid #dcdcdc'>";

    $message .= "<p style='margin: 8px 0'>Имя: <span style='font-weight: bold;'>$data->name</span></p>";

    $message .= "<p style='margin: 8px 0'>Телефон: <span style='font-weight: bold;'>$data->tel</span></p>";

    $message .= $data->street?"<p style='margin: 8px 0'>Адрес: <span style='font-weight: bold;''>$data->street $data->house-$data->apartment, под. $data->door, эт. $data->stage</span></p>":"<p style='margin: 8px 0'>Адрес: <span style='font-weight: bold;''>Самовывоз</span></p>";

    $message .= $data->message?"<p style='margin: 8px 0'>Примечание к заказу: <span style='font-weight: bold;'>$data->message</span></p>":"";

    $message .= ($data->сalculation || $data->pay)?"<p style='margin: 8px 0'>Сдача с: <span style='font-weight: bold;'>$calc</span></p></div>":"<p style='margin: 8px 0'>Оплата: <span style='font-weight: bold;'>по карте</span></p></div>";
            
    $message .= "<table style='width: 100%; margin-top: 25px; border-collapse: collapse;'><thead style='text-align: left; text-transform: uppercase'><tr style='border-bottom: 1px solid grey;'><th><p style='margin: 8px 0;'>Наименование</p></th><th>Количество</th><th>Цена</th></tr></thead>
    <tbody>";

    foreach($basket as $item){
        $title = $item->product->title;
        $struct = is_array($item->product->structure)?"$item->count шт":$item->product->structure;
        $price = $item->product->price*$item->count;

        $total += $price;

        $message .= "<tr style='border-bottom: 1px solid grey;'><td><p style='margin: 15px 0 5px; font-weight: bold;'>$title</p><p style='margin: 0 0 15px; font-size: 0.8em; color: #878787;'>$struct</p></td><td>$item->count</td><td>$price &#8381;</td></tr>";
    }

    $message .= "</tbody></table><div style='padding: 25px 0 0; font-size: 1.2em; text-align: right;'>Итого: <span style='font-weight: bold;'>$total &#8381;</span></div></div></tbody>";

    $to = 'epizza.su@yandex.ru';
    $subject = 'Новый заказ';

    $headers  = "Content-type: text/html; charset=utf-8\r\n";
    $headers .= "From: Ёpizza@site.ru"; 

    mail($to, $subject, $message, $headers);

    echo json_encode($number);
?>