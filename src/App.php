<?php

namespace App;

use App\Input\InputFactory;
use App\Tree\TreeFactory;
use Exception;
use Symfony\Component\Dotenv\Dotenv;

class App
{
    protected string $result = '';

    /**
     * @param array $commandLineArgs
     * @param bool $pretty
     * @throws Exception
     */
    public function execute(array $commandLineArgs, bool $pretty = false): void
    {
        $dotenv = new Dotenv();
        $dotenv->load(APP_DIR . '/.env');

        $tree = TreeFactory::getInstance();
        $input = InputFactory::getInstance($commandLineArgs);
        $tree->insertNames($input);

        $this->result = $tree->getResult($pretty);
    }

    public function output(): string
    {
        return $this->result;
    }

}