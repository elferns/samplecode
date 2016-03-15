<?php

/**
 * Created by PhpStorm.
 * User: elita
 * Date: 3/14/2016
 * Time: 9:19 PM
 */
class test
{

    private static $var1 = 0;

    /**
     * test constructor.
     */
    public function __construct()
    {
        self::$var1 = 1;
    }

    /**
     *
     */
    public function incrementA()
    {
       self::$var1++;
    }

}

//public
//object 1
$t = new test();
$t->incrementA();

//object 2
$t2 = new test();
$t2->incrementA();

