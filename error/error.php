<?php
    switch($code) {
        case '404':
            header("HTTP/1.0 404 Not Found");
            break;

        case '403':
            header("HTTP/1.0 403 Forbidden");
            break;
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Ошибка</title>
    </head>
    <body>
        <h1>Внимание</h1>
        <div><?=$error?></div>
    </body>
</html>
