<?php

namespace Nemundo\Workflow\App\WorkflowTemplate\WorkflowStatus;


use Nemundo\Workflow\App\Inbox\Builder\InboxBuilder;
use Nemundo\Workflow\App\Workflow\Builder\WorkflowItem;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractDataWorkflowStatus;
use Nemundo\Workflow\App\WorkflowTemplate\Data\SendInbox\SendInboxModel;
use Nemundo\Workflow\App\WorkflowTemplate\Data\SendInbox\SendInboxReader;

class SendInboxWorkflowStatus extends AbstractDataWorkflowStatus
{

    protected function loadData()
    {
        $this->contentName = 'Send To Inbox';
        $this->contentId = '62416c6a-6a43-42b1-a8b2-0df25d0f318d';
        $this->changeWorkflowStatus = false;
        $this->modelClass = SendInboxModel::class;
    }


    public function onCreate($dataId)
    {

        $row = (new SendInboxReader())->getRowById($dataId);

        $workflowItem = (new WorkflowItem())->fromDataId($dataId);
        $process = $workflowItem->getProcess();

        $builder = new InboxBuilder();
        $builder->contentType =$process;
        $builder->dataId = $workflowItem->workflowId;
        $builder->subject = $process->getSubject($workflowItem->workflowId);
        $builder->message = $row->comment;
        $builder->createUserInbox($row->userId);

        //$this->createUserInbox($row->userId);


    }


}