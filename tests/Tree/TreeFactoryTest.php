<?php


use App\Json\JsonFile;
use App\Tree\Tree;
use App\Tree\TreeFactory;
use PHPUnit\Framework\TestCase;

class TreeFactoryTest extends TestCase
{
    public function testShouldGetInstance()
    {
        $tree = TreeFactory::getInstance();

        $this->assertInstanceOf(Tree::class, $tree);
    }

    public static function loadTreeJson(): array
    {
        $treeJsonFile = APP_DIR . '/' . $_ENV['TREE_FILE'];
        $treeMaxDepth = isset($_ENV['TREE_MAX_DEPTH']) ? $_ENV['TREE_MAX_DEPTH'] : 512;
        $treeJson = new JsonFile();

        return $treeJson->load($treeJsonFile, $treeMaxDepth);
    }
}