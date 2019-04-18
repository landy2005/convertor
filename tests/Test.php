<?php

use Olifolkerd\Convertor\Convertor;
use Olifolkerd\Convertor\Exceptions\ConvertorInvalidUnitException;
use PHPUnit\Framework\TestCase;

//todo: add tests for all other conversions.

/**
 * Class Test
 * Provides tests for the convertor to make sure conversions are fine
 * Currently tested unit groups are:
 * - Temperature
 * - Weight
 * - Pressure
 * - Area density
 * - Speeds
 * - Distance
 * - time
 * todo:
 * - area
 * - volume
 * - power
 */
class Test extends TestCase
{
  /**
   * @test
   * @dataProvider providerUnitTo
   */
    public function testUnitTo($from, $value, $unit, $result, $delta = 0.000001)
    {
        $conv = new Convertor();
        $conv->from($value, $from);
        //$val = $conv->to($unit, 6, true);
        $val = $conv->to($unit);
        $this->assertEquals($result, $val, "Not inside of float delta", $delta);
    }

    /**
     * @test
     * @dataProvider providerUnitToSI
     */
    public function testUnitToSI($from, $value, $si) {
        $conv = new Convertor();
        $conv->from($value, $from);
        $delta = 1E-6;
        $val = $conv->toMany(array_keys($si), 7, true);
        foreach ($si as $unit => $result)
        {
            $this->assertEquals($result, $val[$unit], "Not inside of float delta", $delta);
        }

        // From SI to SI
        foreach ($si as $sunit => $sresult)
        {
            $conv->from($sresult, $sunit);
            $val = $conv->toMany(array_keys($si));
            foreach ($si as $unit => $result)
            {
                $this->assertEquals($result, $val[$unit], "Not inside of float delta", $delta);
            }
        }
    }

    public function providerUnitTo()
    {
        $array = array();

        // Temperature units
        $from = 'k';
        $array[] = array($from, 0,        'c', -273.15);
        $array[] = array($from, 255.372,  'c', -17.778);
        $array[] = array($from, 273.15,   'c', 0);
        $array[] = array($from, 273.16,   'c', 0.01);
        $array[] = array($from, 373.1339, 'c', 99.9839);
        $array[] = array($from, 0,        'f', -459.67);
        $array[] = array($from, 255.372,  'f', 0,         0.001);
        $array[] = array($from, 273.15,   'f', 32);
        $array[] = array($from, 273.16,   'f', 32.018);
        $array[] = array($from, 373.1339, 'f', 211.97102);
        $array[] = array($from, 0,        'r', 0);
        $array[] = array($from, 255.372,  'r', 459.67,    0.001);
        $array[] = array($from, 273.15,   'r', 491.67);
        $array[] = array($from, 273.16,   'r', 491.688);
        $array[] = array($from, 373.1339, 'r', 671.64102);

        // Length units
        $from = 'km';
        $value = 5;
        $array[] = array($from, $value, 'm',    5000);
        $array[] = array($from, $value, 'in',   196850.394,   0.001);
        $array[] = array($from, $value, 'hh',   196850.394/4, 0.001);
        $array[] = array($from, $value, 'ft',   16404.2,      0.01);
        $array[] = array($from, $value, 'yd',   5468.07,      0.01);
        $array[] = array($from, $value, 'mi',   3.106856);
        $array[] = array($from, $value, 'ly',   5.285e-13,      1e-16);
        $array[] = array($from, $value, 'au',   3.34229e-8,     1e-11);
        $array[] = array($from, $value, 'pc',   1.62038965e-13, 1e-20);

        $from = 'yd';
        $value = 100;
        $array[] = array($from, $value, 'ft',   300);
        $array[] = array($from, $value, 'hh',   900);
        $array[] = array($from, $value, 'in',   3600);
        $array[] = array($from, $value, 'yd',   100);
        $array[] = array($from, $value, 'mi',   0.056818);
        $array[] = array($from, $value, 'm',    91.44);

        $from = 'km';
        $value = 3.086e+16; //test big units
        $array[] = array($from, $value, 'ly',   3261.9045737999631456);
        $array[] = array($from, $value, 'au',   206286358.59320423007);
        $array[] = array($from, $value, 'pc',   1000.1, 0.01);

        // Pressure units
        $from = 'pa';
        $value = 100;
        $array[] = array($from, $value, 'pa',   100);
        $array[] = array($from, $value, 'bar',  0.001);
        $array[] = array($from, $value, 'torr', 0.750062);
        $array[] = array($from, $value, 'psi',  0.0145038);
        $array[] = array($from, $value, 'ksi',  0.0000145038,    1E-9);
        $array[] = array($from, $value, 'mpsi', 0.0000000145038, 1E-12);
        $array[] = array($from, $value, 'mmhg', 0.7500616);
        $array[] = array($from, $value, 'atm',  0.000986923,     1E-9);
        $array[] = array($from, $value, 'at',   0.00101972,      1E-8);

        // Weight units
        $from = 'g';
        $value = 100;
        $array[] = array($from, $value, 'g',     100);
        $array[] = array($from, $value, 't',     1e-4);
        $array[] = array($from, $value, 'gr',    1543.235835, 0.000001);
        $array[] = array($from, $value, 'oz',    3.527396, 0.000001);
        $array[] = array($from, $value, 'lb',    0.220462);
        $array[] = array($from, $value, 'st',    0.0157473);
        $array[] = array($from, $value, 'cwt',   0.00196841);
        $array[] = array($from, $value, 'ust',   0.000110231);
        $array[] = array($from, $value, 'ukt',   9.842065e-5);
        $array[] = array($from, $value, 'picul', 0.001653467);

        // Force units
        $from = 'N';
        $value = 100;
        $array[] = array($from, $value, 'N',     100);
        $array[] = array($from, $value, 'gf',    10197.1621);
        $array[] = array($from, $value, 'p',     10197.1621);
        $array[] = array($from, $value, 'dyn',   1e7);
        $array[] = array($from, $value, 'lbf',   22.480894);
        $array[] = array($from, $value, 'pdl',   723.301385);

        // Time units
        $from = 'h';
        $value = 100;
        $array[] = array($from, $value, 's',    100 * 60 * 60);
        $array[] = array($from, $value, 'min',  100 * 60);
        $array[] = array($from, $value, 'h',    100);
        $array[] = array($from, $value, 'hr',   100);
        $array[] = array($from, $value, 'day',  100 / 24);
        $array[] = array($from, $value, 'week', 100 / 24 / 7);
        $array[] = array($from, $value, 'month',100 / 24 / 7 / 31);
        $array[] = array($from, $value, 'year', 100 / 24 / 365);

        // Rotation Units
        $from = 'deg';
        $value = 100;
        $array[] = array($from, $value, 'deg',  100);
        $array[] = array($from, $value, 'rad',  1.745329);
        $array[] = array($from, $value, 'grad', 111.111111);
        $array[] = array($from, $value, 'as',   360000);
        $array[] = array($from, $value, 'am',   6000);

        return $array;
    }

    public function providerUnitToSI()
    {
        $array = array();

        // Pressure units
        $from = 'pa';
        $value = 100;
        $si = array('hPa' => 1,
                    'kPa' => 0.1,    // kilopascal
                    'mPa' => 100000, // millipascal
                    'MPa' => 0.0001, // megapascal
                    'mBar' => 1);    // millibar
        $array[] = array($from, $value, $si);

        // Distance units
        $from = 'km';
        $value = 5;
        $si = array('dm' => 5e+4,
                    'cm' => 5e+5,
                    'mm' => 5e+6,
                    'μm' => 5e+9,
                    'nm' => 5e+12,
                    'pm' => 5e+15);
        $array[] = array($from, $value, $si);

        // Time units
        $from = 'hr';
        $value = 100;
        $si = array('ns' => 100 * 3600 * 1000 * 1000 * 1000,
                    'μs' => 100 * 3600 * 1000 * 1000,
                    'ms' => 100 * 3600 * 1000);
        $array[] = array($from, $value, $si);

        // Rotation units
        $from = 'mrad'; // milliradians
        $value = 17.453292519943294;
        //$from = 'deg';
        //$value = 1;
        $si = array('μrad' => 17453.292519943294,
                    'μas'  => 1 * 3600 * 1000 * 1000,
                    'mas'  => 1 * 3600 * 1000);
        $array[] = array($from, $value, $si);

        return $array;
    }

    /** @test */
    public function testAreaDensity()
    {
        $conv = new Convertor();
        $conv->from(1, 'kg m**-2');
        $val=$conv->toAll(6, true);
        $this->assertEquals(1, $val['kg m**-2'], "Not inside of float delta", 0.00001);
        $this->assertEquals(1000000, $val['kg km**-2'], "Not inside of float delta", 0.00001);
        $this->assertEquals(1e-4, $val['kg cm**-2'], "Not inside of float delta", 0.00001);
        $this->assertEquals(1e-6, $val['kg mm**-2'], "Not inside of float delta", 0.00001);
        $this->assertEquals(1000, $val['g m**-2'], "Not inside of float delta", 0.00001);
        $this->assertEquals(1000000, $val['mg m**-2'], "Not inside of float delta", 0.00001);
        $this->assertEquals(0.157473, $val['st m**-2'], "Not inside of float delta", 0.00001);
        $this->assertEquals(2.20462, $val['lb m**-2'], "Not inside of float delta", 0.00001);
        $this->assertEquals(35.274, $val['oz m**-2'], "Not inside of float delta", 0.00001);
    }
    /** @test */
    public function testSpeeds()
    {
        $conv = new Convertor();
        $conv->from(3,'km h**-1');
        $val=$conv->toAll(6,true);
        $this->assertEquals(0.83333,$val['m s**-1'],"Not inside of float delta",0.00001);
        $this->assertEquals(3,$val['km h**-1'],"Not inside of float delta",0.00001);
        $this->assertEquals(1.86411,$val['mi h**-1'],"Not inside of float delta",0.00001);
        $conv->from(100,'m s**-1');
        $val=$conv->toAll(3,true);
        $this->assertEquals(100,$val['m s**-1'],"Not inside of float delta",0.00001);
        $this->assertEquals(360,$val['km h**-1'],"Not inside of float delta",0.00001);
        $this->assertEquals(223.694,$val['mi h**-1'],"Not inside of float delta",0.0001);
    }

    /** @test */
    public function testUnitDoesNotExist()
    {
        $this->expectException(ConvertorInvalidUnitException::class);
        new Convertor(1, "nonsenseunit");
    }

    /** @test */
    public function testBaseConstructor()
    {
        $c = new Convertor();
        $c->from(6.16, 'ft');
        $this->assertEquals(1.87757, $c->to('m', 5));
    }
}