![Convertor](http://olifolkerd.github.io/convertor/images/logo.png)

An easy to use PHP unit conversion library.

Full documentation & demos can be found at: [http://olifolkerd.github.io/convertor](http://olifolkerd.github.io/convertor)

Convertor 
================================

An easy to use PHP unit conversion library.

Converter allows you to convert any unit to any other compatible unit type.

It has no external dependencies, simply include the library in your project and you're away!

Convertor can handle a wide range of unit types including:
<ul>
	<li>Length</li>
	<li>Area</li>
	<li>Volume</li>
	<li>Weight</li>
	<li>Speed</li>
	<li>Rotation</li>
	<li>Temperature</li>
	<li>Pressure</li>
	<li>Time</li>
	<li>Energy/Power</li>
</ul>

If you need additional unit types, then it is easy to add your own.

Setup
================================
Setting up Convertor could not be simpler by using Composer.
Add the following to your `composer.json` file:
```
"repositories": [
	...
	{
		"type": "vcs",
		"url": "https://github.com/olifolkerd/convertor"
	}
	...
],
"require": {
	...
	"olifolkerd/convertor": "dev-master",
	...
}
```

Simple Example
================================

Once you have included the Converter.php library, creating conversions is as simple as creating an instance of the Convertor with the value to convert from, then specifying the new units

```php
$simpleConvertor = new Convertor(10, "m");
$simpleConvertor->to("ft"); //returns converted value
```
10 Meters = 32.808398950131 Feet

Define your own Units
================================
Convertor now supports using different files that contain the unit conversions by specifying either the path to the file containing the unit array or the filename of the file in `src/config`directly:
```php
//using the default file in `src/Config/Units.php`:
$c=new Convertor(100,"mps");
//using another file somewhere in the project:
$c=new Convertor(100,"mps",'/path/to/my/own/Units.php');
//using the name of the file in conf:
$c=new Convertor(100,"mps",'BaseUnits.php');
//define own units inline
$arr = [
    "m" => array("base" => "m", "conversion" => 1, "prefixes" = true),
    "ft" => array("base" => "m", "conversion" => 0.3048),
];

$c = new Convertor(1, 'm', $arr);
```

Currently two Unit files are available - one containing the owner's notation and the other one a more formal notation.
Differences in notation:

| Variant | km²     | kg/m²      | FileName        |
|---------|---------|------------|-----------------|
| owner   | 'km2'   | -          | `BaseUnits.php` |
| formal  | 'km**2' | 'kg m**-2' | `Units.php`     |

Additionally the `Units.php` file contains area-density definitions.

SI prefixes
================================

We support SI prefixes for units. Instead write each unit itself, add _"prefixes" = true_ parameter in unit definition. SI prefixes is case sensitive.
I.e., this definition:
```php
"m" => array("base" => "m", "conversion" => 1, "prefixes" = true),
```
adds all possible SI variants of unit: **nm (nanometer), km (kilometer), Mm (megameter)**, etc.

List of all possible prefixes:

| Name  | Symbol | Factor          |   | Name  | Symbol | Factor           |
|-------|--------|-----------------|---|-------|--------|------------------|
| deca  | da     | 10<sup>1</sup>  |   | deci  | d      | 10<sup>-1</sup>  |
| hecto | h      | 10<sup>2</sup>  |   | centi | c      | 10<sup>-2</sup>  |
| kilo  | k      | 10<sup>3</sup>  |   | milli | m      | 10<sup>-3</sup>  |
| mega  | M      | 10<sup>6</sup>  |   | micro | µ      | 10<sup>-6</sup>  |
| giga  | G      | 10<sup>9</sup>  |   | nano  | n      | 10<sup>-9</sup>  |
| tera  | T      | 10<sup>12</sup> |   | pico  | p      | 10<sup>-12</sup> |
| peta  | P      | 10<sup>15</sup> |   | femto | f      | 10<sup>-15</sup> |
| exa   | E      | 10<sup>18</sup> |   | atto  | a      | 10<sup>-18</sup> |
| zetta | Z      | 10<sup>21</sup> |   | zepto | z      | 10<sup>-21</sup> |
| yotta | Y      | 10<sup>24</sup> |   | yocto | y      | 10<sup>-24</sup> |

Resources
================================
- PHP-Skeleton as a template for the autoloading structure: [github](https://github.com/petk/php-skeleton)
