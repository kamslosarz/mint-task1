<?php

use App\Input\Input;
use PHPUnit\Framework\TestCase;

class InputTest extends TestCase
{
    public function testShouldGetItem()
    {
        $input = new Input([
            ['id' => 1],
            ['id' => 2]
        ]);

        $this->assertEquals(['id' => 1], $input->getItem(1));
    }
}