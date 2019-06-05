<?php

require __DIR__ . '/../../../config.php';

$orm = new \Nemundo\Admin\AppDesigner\Orm\ProjectOrm();
$orm->project = new \Nemundo\Workflow\WorkflowProject();
$orm->createOrm();

