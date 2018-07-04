<?php

namespace Nemundo\Workflow\App\Task\Builder;


use Nemundo\Core\Type\DateTime\Date;
use Nemundo\User\Usergroup\AbstractUsergroup;
use Nemundo\User\Usergroup\UsergroupItem;
use Nemundo\Workflow\App\Identification\Type\UsergroupIdentificationType;
use Nemundo\Workflow\App\Identification\Type\UserIdentificationType;
use Nemundo\Workflow\App\Inbox\Builder\InboxBuilder;
use Nemundo\Workflow\App\Task\Data\Task\Task;
use Nemundo\Workflow\Content\Builder\AbstractIdentificationBuilder;


abstract class AbstractTaskBuilder extends AbstractIdentificationBuilder
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

        if ($this->identificationType->isObjectOfClass(UserIdentificationType::class)) {
            $this->createInboxItem($this->identificationId);
        }


        if ($this->identificationType->isObjectOfClass(UsergroupIdentificationType::class)) {

            $usergroup = new UsergroupItem($this->identificationId);

            foreach ($usergroup->getUserList() as $user) {
                //$this->createInboxItem($user->id);
            }


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