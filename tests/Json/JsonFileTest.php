<?php

use App\Json\JsonFile;
use PHPUnit\Framework\TestCase;

class JsonFileText extends TestCase
{
    public function testShouldLoadJsonFile()
    {
        $jsonFile = new JsonFile();
        $tree = $jsonFile->load(APP_DIR . '/tests/fixtures/tree.json');

        $this->assertIsArray($tree);
    }

    public function testShouldLoadJsonFileAndFailOnMissingFile()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessageMatches('/Missing [\S\s]+ file/');

        $jsonFile = new JsonFile();
        $jsonFile->load(APP_DIR . '/tests/fixtures/tree-missing.json');
    }

    public function testShouldLoadJsonFileAndFailOnJsonFileDeepness()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessageMatches('/Invalid or too deep [\S\s]+ file/');
        $jsonFile = new JsonFile();
        $jsonFile->load(APP_DIR . '/tests/fixtures/tree.json', 2);
    }
}