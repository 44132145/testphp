<?php
require (HOME_T.'models/Product.php');

$requireFiles = [
    'css&&js' => 'css&js.htm',
    'menu'  => 'menu_row.php',
    'resultTable' => 'productTable.php',
    'footer' => 'footer.htm',
] + ((isset($requireFiles) && (is_array($requireFiles)))? $requireFiles: []);

//arrays can bee as result of some method of object as:
// $ObjMenu = new Menu;
// $menu = $ObjMenu->asArray;

$menu = [//'NAME' => 'URL'
    'home' => '#',
    'info' => '#',
    'about us' => '#',
    'other' =>  '#',
];

if (!isset($products)){
    $prodObj = new Product;
    $products = $prodObj->asArray();
}
?>