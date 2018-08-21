<?php

namespace Nemundo\Workflow\App\Workflow\Com\Container;


use Nemundo\App\Content\Factory\ContentTypeFactory;
use Nemundo\Com\Container\AbstractHtmlContainerList;
use Nemundo\Workflow\App\Workflow\Com\Button\DraftReleaseButton;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractDataListWorkflowStatus;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractWorkflowStatus;
use Nemundo\Workflow\App\Workflow\Data\Workflow\WorkflowReader;
use Nemundo\Workflow\App\Workflow\Event\WorkflowEvent;
use Nemundo\Workflow\App\Workflow\Process\AbstractProcess;
use Nemundo\Workflow\App\Workflow\Com\Title\WorkflowTitle;
use Nemundo\Workflow\App\Workflow\Parameter\WorkflowParameter;

class StatusChangeContainer extends AbstractHtmlContainerList
{

    /**
     * @var AbstractProcess
     */
    public $process;

    public function getHtml()
    {

        $workflowId = (new WorkflowParameter())->getValue();

        $workflowRow = (new WorkflowReader())->getRowById($workflowId);

        $title = new WorkflowTitle($this);
        $title->workflowId = $workflowId;

        /** @var AbstractWorkflowStatus $workflowStatus */
        $workflowStatus = (new ContentTypeFactory())->getContentTypeByParameter();

        $factory = new StatusChangeFormFactory();
        $factory->worklfowStatus = $workflowStatus;
        $factory->workflowId = $workflowId;
        $factory->redirect = $this->process->getItemSite($workflowId);
        $factory->getForm($this);

        //if ($workflowStatus->isObjectOfClass(AbstractDataListWorkflowStatus::class)) {
        if ($workflowStatus->draftMode) {
            if ($workflowRow->draft) {
                $btn = new DraftReleaseButton($this);
                $btn->workflowId = $workflowId;
            }
        }

        return parent::getHtml();

    }

}