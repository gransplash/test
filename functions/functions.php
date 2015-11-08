<?php

function print_arr($arr) {
    echo "<pre>";
    print_r($arr);
    echo "</pre>";
}

function getIdArticle() {
    $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $pathParts = explode('/', $path);
    $id = $pathParts[3];
    return $id;
}