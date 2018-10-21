<?php

namespace Nemundo\Workflow\App\Workflow\Com\Menu;

use Nemundo\App\Content\Type\Process\AbstractWorkflowProcess;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractWorkflowStatus;
use Nemundo\Com\Container\AbstractHtmlContainerList;

class WorkflowStatusMenu extends AbstractHtmlContainerList
{

    /**
     * @var AbstractWorkflowProcess
     */
    public $process;

    /**
     * @var AbstractWorkflowStatus
     */
    public $formStatus;


    public function getHtml()
    {

        $status = $this->process->getStatus();

        $table = new WorkflowStatusTable($this);
        $table->process = $this->process;

        foreach ($this->process->getChild() as $contentType) {
            if ($contentType->showStatus) {
                if ($contentType->isNotDraft()) {
                    $table->addLogWorkflowStatus($contentType);
                }
            }
        }


        if ($this->process->isWorkflowOpen()) {

            $nextStatus = $status->getNextContentType();

            if ($this->process->dataId == null) {
                //(new Debug())->write('new process');
                $nextStatus = $status;
                $this->formStatus = $status;
            }

            if ($nextStatus !== null) {

                //if ($nextStatus->checkUserVisibility()) {

                $active = false;
                if ($this->formStatus->contentId == $nextStatus->contentId) {
                    $active = true;
                }
                $table->addActiveWorkflowStatus($nextStatus, $active);

                //}

            }

            $table->addMenu();

            if ($nextStatus !== null) {
                foreach ($nextStatus->getNextContentTypeList() as $item) {
                    $table->addNextWorkflowStatus($item);
                }
            }

        }

        return parent::getHtml();

    }

}