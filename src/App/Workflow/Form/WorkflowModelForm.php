<?php

namespace Nemundo\Workflow\App\Workflow\Form;


use Nemundo\Admin\Com\Button\AdminButton;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\App\Content\Parameter\ContentTypeParameter;
use Nemundo\Com\Html\Basic\Paragraph;
use Nemundo\Core\Debug\Debug;
use Nemundo\Package\Bootstrap\Form\BootstrapModelForm;
use Nemundo\Web\Site\Site;
use Nemundo\Workflow\App\Workflow\Builder\WorkflowItem;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractDataWorkflowStatus;
use Nemundo\Workflow\App\Workflow\Content\Type\WorkflowIdTrait;
use Nemundo\Workflow\App\Workflow\Event\WorkflowEvent;
use Nemundo\Workflow\App\Workflow\Parameter\WorkflowParameter;
use Nemundo\Workflow\App\WorkflowTemplate\WorkflowStatus\WorkflowAbortWorkflowStatus;

class WorkflowModelForm extends BootstrapModelForm
{

    /**
     * @var AbstractDataWorkflowStatus
     */
    public $workflowStatus;

    /**
     * @var string
     */
    public $workflowId;


    public function getHtml()
    {

        $this->addCssClass('border');

        $title = new AdminTitle($this);
        $title->content = $this->workflowStatus->name;


        $p = new Paragraph($this);
        $p->content = 'WorkflowModelForm';

        $btn = new AdminButton($this);
        $btn->content = 'Abbruch';

        $btn->site = new Site();
        $btn->site->addParameter(new ContentTypeParameter((new WorkflowAbortWorkflowStatus())->id));
        //$btn->site->addParameter(new WorkflowParameter($workflowItem->workflowId));


        return parent::getHtml();
    }


    protected function onSubmit()
    {

        $dataId = parent::onSubmit();


        /*
        $event = new WorkflowEvent();
        $event->workflowId = $this->workflowId;
        $event->workflowStatus = $this->workflowStatus;
        $event->run($dataId);

        //$form->afterSubmitEvent->addEvent($event);


        $workflowItem = (new WorkflowItem())->fromDataId($dataId);


        //(new Debug())->write($dataId);

        /*
        if ($this->workflowStatus->redirectNextContentType) {

            $this->redirectSite = new Site();
            $this->redirectSite->addParameter(new ContentTypeParameter($this->workflowStatus->getNextContentType()->id));
            $this->redirectSite->addParameter(new WorkflowParameter($workflowItem->workflowId));

        }*/


    }


}