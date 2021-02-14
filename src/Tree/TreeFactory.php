<?php

namespace App\Tree;

use App\Json\JsonFile;
use Exception;

abstract class TreeFactory
{

    /**
     * @return Tree
     * @throws Exception
     */
    public static function getInstance(): Tree
    {
        $treeJson = self::loadTreeJson();

        return new Tree($treeJson);
    }

    protected static function loadTreeJson(): array
    {
        $treeJsonFile = APP_DIR . '/' . $_ENV['TREE_FILE'];
        $treeMaxDepth = isset($_ENV['TREE_MAX_DEPTH']) ? $_ENV['TREE_MAX_DEPTH'] : 512;
        $treeJson = new JsonFile();

        return $treeJson->load($treeJsonFile, $treeMaxDepth);
    }
}