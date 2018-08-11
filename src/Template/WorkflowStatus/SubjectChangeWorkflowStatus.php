<?php

namespace Nemundo\Workflow\Template\WorkflowStatus;

use Nemundo\Workflow\Action\SubjectWorkflowAction;
use Nemundo\Workflow\App\WorkflowTemplate\Data\SubjectChange\SubjectChangeModel;
use Nemundo\Workflow\App\WorkflowTemplate\Data\SubjectChange\SubjectChangeReader;
use Nemundo\Workflow\App\Workflow\Builder\StatusChangeEvent;
use Nemundo\Workflow\App\Workflow\Content\Type\Form\SubjectChangeForm;
use Nemundo\Workflow\App\Workflow\Content\Type\Item\SubjectChangeItem;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractWorkflowStatus;

class SubjectChangeWorkflowStatus extends AbstractWorkflowStatus
{

    protected function loadData()
    {

        $this->name = 'Change Subject';
        $this->id = 'bea4e096-e356-4b07-886e-8c5533f052d5';
        $this->changeWorkflowStatus = false;

        //$this->modelClassName = SubjectChangeModel::class;
        //$this->formClassName = SubjectChangeForm::class;
        $this->itemClass = SubjectChangeItem::class;


    }


    public function onChange(StatusChangeEvent $changeEvent)
    {

        $row = (new SubjectChangeReader())->getRowById($changeEvent->dataId);

        (new SubjectWorkflowAction($changeEvent))
            ->changeSubject($row->subject);

    }

}