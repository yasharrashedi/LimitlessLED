Milight/LimitlessLED/EasyBulb Complete PHP API
==============

The complete API of Milight/LimitlessLED/EasyBulb written in PHP.
This code has been tested on Wifi Bridge V.4 and is working pretty well.
Any help and bugfixes are welcome.


Note (1): There are two different channels for white and RGBW on Wifi Bridge so you can't mix white bulbs with RGBW bulbs on the same group.

Note (2): Brightness (dimming) values for RGBW bulbs are different for white and RGB modes and brightness value is saved in bulbs separately either mode.

Note (3): RGBW bulbs can't mix RGB and white colors, these bulbs only can operate in white or RGB mode so you can't set saturation. Only brightness can be set in RGB mode.

~~Note (4): Since Wifi Bridge V.4 the web interface for Wifi Bridge configuration has been removed and static IP can be set only from mobile app or using AT commands (currently we are working on adding PHP API for configuration and auto bridge discovery)~~

Note (4): Web interface is back in new firmware update. You can update the firmware and use web-based interface (by typing IP in browser) to set static IP address.

There are two methods for setting active group one for RGBW bulbs (setRgbwActiveGroup or rgbwSetActiveGroup) and for white bulbs (setWhiteActiveGroup or whiteSetActiveGroup). After setting active channel you will be able to send commands to chosen bulb group.

Bulbs only support 256 colors (not 16 millions) but there is a method for setting RGB hex strings (for example, #FF1254). This is then configured to nearest supported color. It is also possible to provide HSV colors.

Example:

```php
<?php
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
$milight->setWhiteActiveGroup(2);
$milight->whiteWarmIncrease();
$milight->whiteWarmIncrease();
$milight->whiteWarmIncrease();
```

Have fun!
