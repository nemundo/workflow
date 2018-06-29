<?php

namespace Nemundo\Workflow\App\Task\Builder;


use Nemundo\Core\Type\DateTime\Date;
use Nemundo\Workflow\App\Task\Data\Task\Task;
use Nemundo\Workflow\Content\Builder\AbstractIdentificationBuilder;

class TaskBuilder extends AbstractIdentificationBuilder
{

    /**
     * @var string
     */
    public $task;

    /**
     * @var Date
     */
    public $deadline;

    /**
     * @var int
     */
    public $timeEffort = 0;


    public function createItem()
    {

        $this->check();

        if (!$this->checkProperty('task')) {
            return;
        }

        $data = new Task();
        $data->task = $this->task;
        $data->deadline = $this->deadline;
        $data->contentTypeId = $this->contentType->id;
        $data->dataId = $this->dataId;
        $data->timeEffort = $this->timeEffort;
        $data->identificationTypeId = $this->identificationType->id;
        $data->identificationId = $this->identificationId;
        $data->save();


    }


}