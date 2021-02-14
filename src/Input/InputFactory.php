<?php

namespace App\Input;

use App\Json\JsonFile;
use Exception;

abstract class InputFactory
{
    /**
     * @param array $commandLineArgs
     * @return Input
     * @throws Exception
     */
    public static function getInstance(array $commandLineArgs): Input
    {
        if(!isset($commandLineArgs[1]))
        {
            throw new Exception('Missing input list.json. Use tree.php /some/directory/list.json');
        }

        $jsonFile = new JsonFile();

        return new Input($jsonFile->load($commandLineArgs[1]));
    }
}