<?php

class AllTest extends PHPUnit_Framework_TestSuite {

    public static function suite()
    {
        $suite = new CakeTestSuite('All Test');
        $suite->addTestDirectory(__DIR__ . DS . 'Model');
        return $suite;
    }

}
