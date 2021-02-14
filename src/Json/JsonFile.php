<?php

namespace App\Json;

use Exception;

final class JsonFile
{
    /**
     * @param string $filename
     * @param int $maxDepth
     * @return array
     * @throws Exception
     */
    public function load(string $filename, $maxDepth = 512): array
    {
        if(!file_exists($filename))
        {
            throw new Exception(sprintf('Missing %s file', $filename));
        }
        $treeJson = json_decode(file_get_contents($filename), true, $maxDepth, JSON_BIGINT_AS_STRING);

        if(is_null($treeJson) || !is_array($treeJson))
        {
            throw new Exception(sprintf('Invalid or too deep %s file', $filename));
        }

        return $treeJson;
    }
}