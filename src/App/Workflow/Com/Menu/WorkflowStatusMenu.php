<?php

namespace Nemundo\Workflow\App\Workflow\Com\Menu;


use Nemundo\Admin\Com\Button\AdminButton;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\App\Content\Parameter\ContentTypeParameter;
use Nemundo\App\Content\Parameter\DataIdParameter;
use Nemundo\App\Content\Site\Draft\ContentDraftFreigebenSite;
use Nemundo\App\Content\Type\Process\AbstractWorkflowProcess;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractWorkflowStatus;
use Nemundo\Com\Container\AbstractHtmlContainerList;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Core\Debug\Debug;
use Nemundo\Package\Bootstrap\Button\BootstrapButtonColor;
use Nemundo\Package\FontAwesome\Icon\CheckIcon;
use Nemundo\Web\Site\Site;
use Paranautik\App\VideoWorkflow\Content\Type\Status\VideoProposalStatus;


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