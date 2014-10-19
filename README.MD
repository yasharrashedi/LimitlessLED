Milight/LimitlessLED/EasyBulb Complete PHP API
==============

The complete API of Milight/LimitlessLED/EasyBulb written in PHP.
This code has been tested on Wifi Bridge V.4 and working pretty well.
any help, bugfixes are welcome.


Note (1): There are two diffrent channels for white and RGBW on Wifi Bridge so you cannot mix white bulbs with RGBW bulbs on the same group.

Note (2): Brightness (dimming) values for RGBW bulbs are different for white and RGB modes and brightness value is saved in bulbs separately for white and RGB modes.

Note (3): RGBW bulbs can't mix RGB and white colors, these bulbs only can operate in white or RGB mode so you can't set saturation, only brightness can be set in RGB mode.

Note (4): Since Wifi Bridge V.4 the web interface for Wifi Bridge configuration has been removed and static IP can be set only from mobile app or AT commands (currently we are working on it to add PHP API for configuration and auto bridge discovery)


there are two methods for setting active group one for rgbw bulbs (setRgbwActiveGroup or rgbwSetActiveGroup) and the other for white bulbs (setWhiteActiveGroup or whiteSetActiveGroup).
After setting active channel you will be able to send command to desired bulb group.
there are several helper methods that makes life easy, and makes no need for setting active group for some command.
Also this bulbs only support 256 colors (not 16 millions) but there is a method for setting rgb hex strings like #FF1254, so this method translates color to nearest color of milight color code.
Also you can set HSV colors for rgbw bulbs.

Example:

```php
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
```


Have fun!
