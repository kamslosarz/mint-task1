<?php

namespace App\Input;

class Input
{
    protected $inputArray = [];

    public function __construct(protected array $input)
    {
        foreach($this->input as $item)
        {
            $this->inputArray[(int) $item['id']] = $item;
        }
    }

    public function getItem(int $id): ?array
    {
        return isset($this->inputArray[$id]) ? $this->inputArray[$id] : null;
    }
}