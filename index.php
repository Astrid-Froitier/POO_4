<?php

require_once 'Car.php';

$van = new Car('red',2, 50, 50);
var_dump($van);

echo $van->start();