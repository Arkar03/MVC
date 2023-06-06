<?php

$className = "Home";
$methodName = "index";

$url = isset($_GET['url']) ? rtrim($_GET['url'])  : '';

$url = explode("/", $url);

echo "<pre>" . print_r($url, true) . "</pre>";
echo "<hr>";

if (!empty($url[0])) {
    if (file_exists($url[0] . ".php")) {
        $className = $url[0];
    }
}
if (!empty($url[1])) {
    $methodName = $url[1];
}
echo $className;
echo "<br>";
echo $methodName;
