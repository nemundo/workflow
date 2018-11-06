<?php

require __DIR__ . '/../../../config.php';

\Nemundo\Core\Console\ConsoleConfig::$consoleMode = true;

$test = new \Nemundo\Dev\Test\PhpClassTest();
$test->checkProject(new \Nemundo\Workflow\WorkflowProject());
