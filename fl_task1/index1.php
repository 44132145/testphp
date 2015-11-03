<?php
define('HOME_T', __DIR__.'/');
$MainData = __DIR__ . "/data/main.php";

if (file_exists($MainData))
    require $MainData;
else
    die('Main config not found');

//** include base html header*/
if (file_exists(BASE_HTML_PATH . 'head.html'))
    require BASE_HTML_PATH . 'head.html';
else
    die('No html header!');

$path = __DIR__ . '/views/';
if (isset($requireFiles))
    foreach($requireFiles as $Vfile)
    {
        $Vfile = (((strpos($Vfile,'/') === false) && (strpos($Vfile,'\\') === false))? $path: '') . $Vfile;

        if (file_exists($Vfile))
            require $Vfile;
    }

//** include base html footer*/
if (file_exists(BASE_HTML_PATH . 'footer.html'))
    require BASE_HTML_PATH . 'footer.html';
else
    print"</body></html>";
?>