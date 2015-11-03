<?php
require $_SERVER['DOCUMENT_ROOT'].'/fl_task3/models/dbModule.php';

$DataOBJ = new dbModule();
$products = $DataOBJ->GetData('data', ['name', 'price', 'description', 'time']);

for($i = 0; $i < count($products); $i++){
    $dt = $products[$i]['time'];
    unset($products[$i]['time']);

    foreach ($products[$i] as $key => $val)
        $products[$i][$key] = '<div style="cursor:pointer" onclick="alert(\''.$dt.'\')">'.$val.'</div>';
}
?>