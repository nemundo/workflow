<?php

namespace Nemundo\Workflow\App\Task\Test;


use Nemundo\App\Script\Type\AbstractScript;
use Nemundo\Core\Structure\ForLoop;
use Nemundo\Workflow\App\Task\Builder\TaskBuilder;
use Nemundo\Workflow\App\Task\Process\TaskProcess;
use Schleuniger\Usergroup\SchleunigerUsergroup;

class TaskTest extends AbstractScript
{


    protected function loadScript()
    {
        $this->scriptName = 'task-test';
        $this->consoleScript = true;
    }


    public function run()
    {

        $loop = new ForLoop();
        $loop->minNumber = 1;
        $loop->maxNumber = 100;

        foreach ($loop->getData() as $number) {

            $builder = new TaskBuilder();
            $builder->task = 'Test Aufgabe '.$number;
            $builder->description = '... blalb al bla ...';
            //$builder->dataId
            $builder->contentType = new TaskProcess();

            $builder->createUsergroupTask(new SchleunigerUsergroup());

        }


    }


}