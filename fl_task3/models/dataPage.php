<?php
$requireFiles = [
    'css&&jst3' => __DIR__.'/../views/css&js.htm',
    'msg'   => __DIR__.'/../views/msgPopup.htm'
];

require __DIR__.'/dbModule.php';

$DataOBJ = new dbModule();
$productsData = $DataOBJ->GetData('data', ['name', 'price', 'description']);

$products = [];
for($i = 0; $i < count($productsData); $i++){
    $jsData = implode('\n\r',$productsData[$i]);
    $products[$i] = [
        'name' => '<div onclick="ShowPopup(\''.$jsData.'\')">'.$productsData[$i]['name'].'</div>',
        'price' => '<div onclick="ShowPopup(\''.$jsData.'\')">'.$productsData[$i]['price'].'</div>',
    ];
}

?>