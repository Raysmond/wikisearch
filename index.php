<?php
$Rays = dirname(__FILE__)."/Rays/Rays/Rays.php";
$config = dirname(__FILE__)."/app/config.php";

require_once($Rays);
Rays::newApp($config)->run();
