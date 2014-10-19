<?php

//to keep it simple using require
require 'Milight.php';

$milight = new Milight('192.168.0.54');


$milight->rgbwAllOn();
$milight->rgbwAllSetToWhite();
$milight->rgbwAllBrightnessMax();
sleep(2);
$milight->setRgbwActiveGroup(1);
$milight->rgbwBrightnessPercent(50);
sleep(2);
$milight->setRgbwActiveGroup(2);
$milight->rgbwSetColorHexString('FF1254'); // or #FF1254
$milight->rgbwBrightnessPercent(90);
sleep(2);
$milight->whiteAllOn();
$milight->whiteAllBrightnessMax();
sleep(2);
$milight->whiteGroup1NightMode();
sleep(2);
$milight->setWhiteActiveGroup(1);
$milight->whiteWarmIncrease();
$milight->whiteWarmIncrease();
$milight->whiteWarmIncrease();