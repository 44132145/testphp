<?php
/* simple includer*/
define('BASE_HTML_PATH', $_SERVER['DOCUMENT_ROOT']."/base_html/");

$requestUrl = explode('/', strtolower($_SERVER['REQUEST_URI']));
$file = (isset($requestUrl[1]))? '/fl_' . $requestUrl[1] . '/index1.php': '';

if (($file !==  null) && (file_exists(__DIR__ . $file))){
    require  __DIR__ . $file;
}
else{?>
    <h3>Tasks:</h3>
    <?
        for ($i = 1; $i <= 3; $i++)
        {
        ?>
            <a href="/task<?=$i?>">task<?=$i?></a>
            <br>
        <?
        }
    ?>
<?}?>
