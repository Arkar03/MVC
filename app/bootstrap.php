<?php
require_once "../app/configs/config.php";
require_once "../app/libs/Database.php";
require_once "../app/libs/Core.php";
require_once "../app/libs/Controller.php";
require_once "../app/helpers/helper.php";

spl_autoload_register(function($className) {
    require_once "../app/libs/$className.php";   
});