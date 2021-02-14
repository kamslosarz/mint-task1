<?php


use PHPUnit\Framework\TestCase;

class AppTest extends TestCase
{
    public function testShouldInvokeApp()
    {
        $app = new App\App();

        $app->execute([
            0 => '',
            1 => APP_DIR . '/tests/fixtures/list.json'
        ], true);

        $expectedOutput = file_get_contents(APP_DIR . '/tests/fixtures/test.json');
        $this->assertEquals($expectedOutput, $app->output());
    }
}