<?php

namespace App\Tree;

use App\Input\Input;

class TreeIterator
{
    const COLUMNS_TO_INSERT = [
        'name'
    ];

    protected array $result = [];
    public function __construct(protected Input $input) {}

    public function insert(&$tree): void
    {
        foreach($tree as & $item)
        {
            $this->insertColumns($item);
        }
    }

    protected function insertColumns(array &$item): void
    {
        $inputItem = $this->input->getItem((int)$item['id']);
        if($inputItem)
        {
            $columnsToSet = array_intersect(self::COLUMNS_TO_INSERT, array_keys($inputItem));
            if(!empty($columnsToSet))
            {
                foreach($columnsToSet as $column)
                {
                    $item[$column] = $inputItem[$column];
                }
            }
            if(isset($item['children']))
            {
                $this->insert($item['children']);
            }
        }
    }
}