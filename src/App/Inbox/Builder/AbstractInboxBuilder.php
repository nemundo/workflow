<?php

namespace Nemundo\Workflow\App\Inbox\Builder;


use Nemundo\User\Usergroup\AbstractUsergroup;
use Nemundo\Workflow\App\Inbox\Data\Inbox\Inbox;
use Nemundo\Workflow\Content\Builder\AbstractContentBuilder;

abstract class AbstractInboxBuilder extends AbstractContentBuilder
{

    /**
     * @var string
     */
    public $subject;

    /**
     * @var string
     */
    public $userId;


    public function __construct()
    {
        $this->loadInbox();
    }


    protected function loadInbox()
    {

    }


    public function createItem()
    {

        $data = new Inbox();
        $data->contentTypeId = $this->contentType->id;
        $data->dataId = $this->dataId;
        $data->subject = $this->subject;
        $data->userId = $this->userId;
        $data->save();


    }


    public function createUserInbox($userId)
    {

        $data = new Inbox();
        $data->contentTypeId = $this->contentType->id;
        $data->dataId = $this->dataId;
        $data->subject = $this->subject;
        $data->userId = $userId;
        $data->save();

    }


    public function createUsergroupInbox(AbstractUsergroup $usergroup)
    {

        foreach ($usergroup->getUserList() as $userRow) {
            $this->createUserInbox($userRow->id);
        }

    }


}