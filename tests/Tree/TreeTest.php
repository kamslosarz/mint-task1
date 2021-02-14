<?php

namespace App\Tree;

use App\Input\Input;
use Mockery;
use PHPUnit\Framework\TestCase;

class TreeTest extends TestCase
{
    public function testShouldInsertNames()
    {
        $treeArray = [
            [
                'id' => 1,
                'children' => [
                    [
                        'id' => '2'
                    ]
                ]
            ]
        ];
        $tree = new Tree($treeArray);
        $input = Mockery::mock(Input::class)
            ->shouldReceive('getItem')
            ->with(1)
            ->andReturn([
                'id' => 1,
                'name' => 'test1'
            ])
            ->getMock()
            ->shouldReceive('getItem')
            ->with(2)
            ->andReturn([
                'id' => 2,
                'name' => 'test2'
            ])
            ->getMock();

        /** @var Input $input */
        $tree->insertNames($input);

        $input->shouldHaveReceived('getItem')->times(2);
        $this->assertEquals('[{"id":1,"children":[{"id":"2","name":"test2"}],"name":"test1"}]', $tree->getResult());
    }
}