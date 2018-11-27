<?php

namespace Nemundo\Workflow\App\RepeatingTask\Job;


use Nemundo\App\Scheduler\Job\AbstractSchedulerJob;
use Nemundo\Core\Random\RandomUniqueId;
use Nemundo\Workflow\App\RepeatingTask\Data\RepeatingTask\RepeatingTaskReader;
use Nemundo\Workflow\App\RepeatingTask\Type\RepeatingTaskContentType;
use Nemundo\Workflow\App\Task\Builder\TaskBuilder;
use Schleuniger\Usergroup\SchleunigerUsergroup;

class RepeatingTaskImportJob extends AbstractSchedulerJob
{

    protected function loadScript()
    {

        $this->active = false;
        $this->hour = 1;


    }


    public function run()
    {


        $reader = new RepeatingTaskReader();

        foreach ($reader->getData() as $repeatingTaskRow) {


            $builder = new TaskBuilder();
            $builder->contentType = new RepeatingTaskContentType();
            $builder->task = $repeatingTaskRow->task;
            $builder->dataId = (new RandomUniqueId())->getUniqueId();
            $builder->sourceId = $repeatingTaskRow->id;
            $builder->createUsergroupTask(new SchleunigerUsergroup());


        }


    }


}