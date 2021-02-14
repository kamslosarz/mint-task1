<?php

use App\Input\Input;
use App\Input\InputFactory;
use PHPUnit\Framework\TestCase;

class InputFactoryTest extends TestCase
{
    public function testShouldGetInputInstance()
    {
        $input = InputFactory::getInstance([
            0 => '',
            1 => APP_DIR . '/tests/fixtures/list.json'
        ]);

        $this->assertInstanceOf(Input::class, $input);
    }

    public function testShouldThrowExceptionOnMissingFile()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessageMatches('/Missing [\S\s]+ file/');

        InputFactory::getInstance([
            0 => '',
            1 => APP_DIR . '/tests/fixtures/list-test.json'
        ]);
    }
}