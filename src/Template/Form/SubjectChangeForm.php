<?php

namespace Nemundo\Workflow\WorkflowStatus\Form;


use Nemundo\Design\Bootstrap\Form\BootstrapForm;
use Nemundo\Design\Bootstrap\FormElement\BootstrapTextBox;
use Nemundo\Workflow\Data\SubjectChange\SubjectChange;
use Nemundo\Workflow\Data\Workflow\WorkflowReader;
use Nemundo\Workflow\Form\WorkflowCustomForm;
use Nemundo\Workflow\Parameter\WorkflowParameter;
use Nemundo\Workflow\Site\WorkflowItemSite;
use Nemundo\Workflow\Status\SubjectChangeWorkflowStatus;

class SubjectChangeForm extends WorkflowCustomForm
{

    /**
     * @var BootstrapTextBox
     */
    private $subject;


    public function getHtml()
    {

        $this->subject = new BootstrapTextBox($this);
        $this->subject->label = 'Betreff';
        $this->subject->validation = true;

        $row = (new WorkflowReader())->getRowById($this->workflowId);
        $this->subject->value = $row->subject;


        return parent::getHtml();

    }


    protected function onSubmit()
    {

        $data = new SubjectChange();
        $data->subject = $this->subject->getValue();
        $itemId = $data->save();

        (new SubjectChangeWorkflowStatus())->runWorkflow($this->workflowId, $itemId);

        $this->redirectSite = clone(WorkflowItemSite::$site);
        $this->redirectSite->addParameter(new WorkflowParameter($this->workflowId));

    }

}