<?php

use App\Input\Input;
use App\Tree\TreeIterator;
use PHPUnit\Framework\TestCase;

class TreeIteratorTest extends TestCase
{
    public function testShouldInsertElements()
    {
        $input = Mockery::mock(Input::class)
            ->shouldReceive('getItem')
            ->once()
            ->with(1)
            ->andReturn([
                'id' => 1,
                'name' => 'test1'
            ])
            ->getMock()
            ->shouldReceive('getItem')
            ->once()
            ->with(2)
            ->andReturn(null)
            ->getMock();

        /** @var Input $input */
        $treeIterator = new TreeIterator($input);
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
        $treeIterator->insert($treeArray);
        $this->assertEquals([
            [
                'id' => 1,
                'children' => [
                    [
                        'id' => '2'
                    ]
                ],
                'name' => 'test1'
            ]
        ], $treeArray);
    }
}