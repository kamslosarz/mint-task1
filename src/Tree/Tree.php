<?php

namespace App\Tree;

use App\Input\Input;

class Tree
{
    protected array $result = [];

    public function __construct(public array $tree){}

    public function getResult(bool $pretty = false): string
    {
        return json_encode($this->tree, $pretty ? JSON_PRETTY_PRINT : null);
    }

    public function insertNames(Input $input)
    {
        $treeIterator = new TreeIterator($input);
        $treeIterator->insert($this->tree);
    }
}