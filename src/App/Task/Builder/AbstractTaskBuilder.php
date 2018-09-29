<?php

namespace Nemundo\Workflow\App\Task\Builder;


use Nemundo\App\Content\Type\AbstractContentType;
use Nemundo\Core\Type\DateTime\Date;
use Nemundo\User\Usergroup\AbstractUsergroup;
use Nemundo\User\Usergroup\UsergroupItem;
use Nemundo\Workflow\App\Identification\Type\UsergroupIdentificationType;
use Nemundo\Workflow\App\Identification\Type\UserIdentificationType;
use Nemundo\Workflow\App\Inbox\Builder\InboxBuilder;
use Nemundo\Workflow\App\Task\Data\Task\Task;
use Nemundo\App\Content\Builder\AbstractIdentificationBuilder;
use Nemundo\Workflow\App\Task\Data\Task\TaskUpdate;
use Nemundo\Workflow\App\Task\Process\TaskProcess;


abstract class AbstractTaskBuilder extends AbstractIdentificationBuilder
{

    /**
     * @var string
     */
    public $task;

    /**
     * @var string
     */
    public $description;

    /**
     * @var Date
     */
    public $deadline;

    /**
     * @var int
     */
    public $timeEffort = 0;

    /**
     * @var AbstractContentType
     */
    public $sourceType;

    /**
     * @var string
     */
    public $sourceId;

    /**
     * @var string
     */
    public $source;

    public function createItem()
    {

        //$this->check();

        if (!$this->checkProperty('task')) {
            return;
        }

        $data = new Task();
        $data->task = $this->task;
        $data->description = $this->description;
        $data->deadline = $this->deadline;
        $data->contentTypeId = $this->contentType->id;
        $data->dataId = $this->dataId;
        $data->timeEffort = $this->timeEffort;
        $data->identificationTypeId = $this->identificationType->id;
        $data->identificationId = $this->identificationId;

        if ($this->sourceType !== null) {
            $data->sourceTypeId = $this->sourceType->id;
        }
        $data->source = $this->source;
        $data->sourceId = $this->sourceId;
        $id = $data->save();


        if ($this->contentType->isObjectOfClass(TaskProcess::class)) {

            $update = new TaskUpdate();
            $update->dataId = $id;
            $update->updateById($id);

        }


    }


    private function createInboxItem($userId)
    {

        $builder = new InboxBuilder();
        $builder->subject = $this->task;  // 'Aufgabe: ' . $this->task;
        $builder->dataId = $this->dataId;
        $builder->contentType = $this->contentType;
        $builder->userId = $userId;
        $builder->createItem();

    }


    public function createUserTask($userId)
    {

        $this->identificationType = new UserIdentificationType();
        $this->identificationId = $userId;
        $this->createItem();

    }


    public function createUsergroupTask(AbstractUsergroup $usergroup)
    {

        $this->identificationType = new UsergroupIdentificationType();
        $this->identificationId = $usergroup->id;
        $this->createItem();

    }

}