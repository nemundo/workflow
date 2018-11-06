<?php

require __DIR__ . '/../../../config.php';

\Nemundo\Core\Console\ConsoleConfig::$consoleMode = true;

$orm = new \Nemundo\Admin\AppDesigner\Orm\ProjectOrm();
$orm->project = new \Nemundo\Workflow\WorkflowProject();
$orm->createOrm();

