<?php
/**
 * Units with SI prefixes and more common unit notations as m^2.
 * Base unit is always metric base unit
 */
return array(
    ///////Units Of Length///////
    "m"     => array("base" => "m", "conversion" => 1, "prefixes" => true), //meter - base unit for distance
    "in"    => array("base" => "m", "conversion" => 0.0254), //inch
    "hh"    => array("base" => "m", "conversion" => 0.1016), //hand = 3 inches (NOTE, h is more common for hour, hh is also possible for hand unt)
    "ft"    => array("base" => "m", "conversion" => 0.3048), //foot/feet = 12 inches
    "yd"    => array("base" => "m", "conversion" => 0.9144), //yard = 3 feet = 36 inches
    "mi"    => array("base" => "m", "conversion" => 1609.344), //mile == 5280 feets
    "ly"    => array("base" => "m", "conversion" => 9460730472580800), //lightyear
    "au"    => array("base" => "m", "conversion" => 149597870700), //astronomical unit
    "pc"    => array("base" => "m", "conversion" => 3.085677581491367279E+16, "prefixes" => true), //parsec == au * 648000 / pi (30856775814913672.789139379577965)

    ///////Units Of Area///////
    "m^2"   => array("base" => "m^2", "conversion" => 1, "prefixes" => true), //meter square - base unit for area
    "ha"    => array("base" => "m^2", "conversion" => 10000), //hectare
    "ft^2"  => array("base" => "m^2", "conversion" => 0.092903), //foot square
    "mi^2"  => array("base" => "m^2", "conversion" => 2589988.11), //mile square
    "ac"    => array("base" => "m^2", "conversion" => 4046.86), //acre

    ///////Units Of Volume///////
    "dm3" => array("base" => "l", "conversion" => 1), //cubic decimeter - litre
    "l" => array("base" => "l", "conversion" => 1), //litre - base unit for volume
    "ml" => array("base" => "l", "conversion" => 0.001), //millilitre
    "cm3" => array("base" => "l", "conversion" => 0.001), //cubic centimeter - millilitre
    "hl" => array("base" => "l", "conversion" => 100), //hectolitre
    "kl" => array("base" => "l", "conversion" => 1000), //kilolitre
    "m3" => array("base" => "l", "conversion" => 1000), //meters cubed - kilolitre
    "pt" => array("base" => "l", "conversion" => 0.56826125), //pint
    "gal" => array("base" => "l", "conversion" => 4.405), //gallon
    "qt" => array("base" => "l", "conversion" => 1.1365225), //quart
    "ft3" => array("base" => "l", "conversion" => 28.316846592), //cubic feet
    "in3" => array("base" => "l", "conversion" => 0.016387064), //cubic inches

    ///////Units Of Weight///////
    "g"     => array("base" => "g", "conversion" => 1, "prefixes" => true), //gram - base unit for weight, allowed Si prefixes
    "t"     => array("base" => "g", "conversion" => 1000000, "prefixes" => true), //metric tonne, allowed Si prefixes
    "gr"    => array("base" => "g", "conversion" => 0.06479891), //grain ( https://en.wikipedia.org/wiki/Ounce )
    "oz"    => array("base" => "g", "conversion" => 28.349523125), //ounce == 437.5 grains ( https://en.wikipedia.org/wiki/Ounce )
    "lb"    => array("base" => "g", "conversion" => 453.59237), //pound ( https://en.wikipedia.org/wiki/Pound_(mass) )
    "st"    => array("base" => "g", "conversion" => 6350.29318), //stone == 14 pounds
    "cwt"   => array("base" => "g", "conversion" => 50802.34544), //Hundredweight == 112 lb
    "ust"   => array("base" => "g", "conversion" => 907184.74), //US short Ton == 2000 lb
    "ukt"   => array("base" => "g", "conversion" => 1016046.909), //UK Long Ton == 2240 lb == 20 cwt ( https://en.wikipedia.org/wiki/Long_ton )
    "picul" => array("base" => "g", "conversion" => 60478.982), // Asian picul or tam (https://en.wikipedia.org/wiki/Picul)

    ///////Units Of Force///////
    "N"     => array("base" => "N", "conversion" => 1, "prefixes" => true), //Newton base unit for force, allowed Si prefixes
    "gf"    => array("base" => "N", "conversion" => 9.80665002863885e-3, "prefixes" => true), //gram-force, allowed Si prefixes
    "p"     => array("base" => "N", "conversion" => 9.80665002863885e-3, "prefixes" => true), //pond == gf (alias)
    "dyn"   => array("base" => "N", "conversion" => 1e-5), //dyne
    "lbf"   => array("base" => "N", "conversion" => 453.59237 * 9.80665002863885e-3), //pound-force
    "pdl"   => array("base" => "N", "conversion" => 0.138254954376), //Poundal ( https://en.wikipedia.org/wiki/Poundal )

    //////Units Of Speed///////
    "m s**-1" => array("base" => "m s**-1", "conversion" => 1), //meter per second - base unit for speed
    "km h**-1" => array("base" => "m s**-1", "conversion" => 1/3.6), //kilometer per hour
    "mi h**-1" => array("base" => "m s**-1", "conversion" => 1.60934*1/3.6), //mi => km then convert like km/h

    ///////Units Of Rotation///////
    "deg"   => array("base" => "deg", "conversion" => 1), //degrees - base unit for rotation
    "rad"   => array("base" => "deg", "conversion" => 180 / M_PI, "prefixes" => true), //radian, allowed Si prefixes
    "grad"  => array("base" => "deg", "conversion" => 180 / 200), //grads
    "as"    => array("base" => "deg", "conversion" => 1 / 3600, "prefixes" => true), // Arcsecond, allowed Si prefixes
    "am"    => array("base" => "deg", "conversion" => 1 / 60), // Arcminute

    ///////Units Of Temperature///////
    "K"     => array("base" => "K", "conversion" => 1), //kelvin - base unit for temperature
    "C"     => array("base" => "K", "conversion" => function ($val, $tofrom) { return $tofrom ? $val - 273.15 : $val + 273.15; }), //celsius
    "F"     => array("base" => "K", "conversion" => function ($val, $tofrom) { return $tofrom ? ($val * 9 / 5 - 459.67) : (($val + 459.67) * 5 / 9); }), //Fahrenheit
    "Ra"    => array("base" => "K", "conversion" => function ($val, $tofrom) { return $tofrom ? $val * 9 / 5 : $val * 5 / 9; }), // Rankine

    ///////Units Of Pressure///////
    "Pa"    => array("base" => "Pa", "conversion" => 1, "prefixes" => true), //Pascal - base unit for Pressure, allowed Si prefixes
    "bar"   => array("base" => "Pa", "conversion" => 100000, "prefixes" => true), //bar, allowed Si prefixes
    "psi"   => array("base" => "Pa", "conversion" => 6894.757293168), // pound-force per square inch (lbf/in2)
    "ksi"   => array("base" => "Pa", "conversion" => 6894757.293168), // kilopound-force per square inch
    "Mpsi"  => array("base" => "Pa", "conversion" => 6894757293.168), // megapound-force per square inch
    "mmHg"  => array("base" => "Pa", "conversion" => 133.322387415), // millimeters of mercury
    "inHg"  => array("base" => "Pa", "conversion" => 1 / 0.00029530), // inches of mercury
    "torr"  => array("base" => "Pa", "conversion" => 101325/760), // Torr
    "atm"   => array("base" => "Pa", "conversion" => 101325), // Standard atmosphere
    "at"    => array("base" => "Pa", "conversion" => 98066.5), // Technical atmosphere

    ///////Units Of Time///////
    "s"     => array("base" => "s", "conversion" => 1, "prefixes" => true), //second - base unit for time, allowed SI prefixes
    "year"  => array("base" => "s", "conversion" => 31536000), //year - standard year 365 days
    "month" => array("base" => "s", "conversion" => 18748800), //month - 31 days
    "week"  => array("base" => "s", "conversion" => 604800), //week
    "day"   => array("base" => "s", "conversion" => 86400), //day
    "h"     => array("base" => "s", "conversion" => 3600), //hour
    "hr"    => array("base" => "s", "conversion" => 3600), //hour
    "min"   => array("base" => "s", "conversion" => 60), //minute

    ///////Units Of Power///////
    "j" => array("base" => "j", "conversion" => 1), //joule - base unit for energy
    "kj" => array("base" => "j", "conversion" => 1000), //kilojoule
    "mj" => array("base" => "j", "conversion" => 1000000), //megajoule
    "cal" => array("base" => "j", "conversion" => 4184), //calorie
    "Nm" => array("base" => "j", "conversion" => 1), //newton meter
    "ftlb" => array("base" => "j", "conversion" => 1.35582), //foot pound
    "whr" => array("base" => "j", "conversion" => 3600), //watt hour
    "kwhr" => array("base" => "j", "conversion" => 3600000), //kilowatt hour
    "mwhr" => array("base" => "j", "conversion" => 3600000000), //megawatt hour
    "mev" => array("base" => "j", "conversion" => 0.00000000000000016), //mega electron volt

    ///////Area density///////
    "kg m**-2" => array("base" => "kg m**-2", "conversion" => 1),
    //vary area
    "kg km**-2" => array("base" => "kg m**-2", "conversion" => 0.000001),
    "kg cm**-2" => array("base" => "kg m**-2", "conversion" => 1e4),
    "kg mm**-2" => array("base" => "kg m**-2", "conversion" => 1e6),
    //vary weight
    "g m**-2" => array("base" => "kg m**-2", "conversion" => 0.001), //gram
    "mg m**-2" => array("base" => "kg m**-2", "conversion" => 0.000001), //milligram
    "st m**-2" => array("base" => "kg m**-2", "conversion" => 6.35029), //stone
    "lb m**-2" => array("base" => "kg m**-2", "conversion" => 0.453592), //pound
    "oz m**-2" => array("base" => "kg m**-2", "conversion" => 0.0283495), //ounce
    //todo: add your density conversions here if you need them.
);