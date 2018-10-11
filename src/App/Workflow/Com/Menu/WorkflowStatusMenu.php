<?php

namespace Nemundo\Workflow\App\Workflow\Com\Menu;


use Nemundo\Admin\Com\Button\AdminButton;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\App\Content\Parameter\ContentTypeParameter;
use Nemundo\App\Content\Parameter\DataIdParameter;
use Nemundo\App\Content\Site\Draft\ContentDraftFreigebenSite;
use Nemundo\App\Content\Type\Process\AbstractWorkflowProcess;
use Nemundo\App\Content\Type\Workflow\AbstractWorkflowStatus;
use Nemundo\Com\Container\AbstractHtmlContainerList;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Core\Debug\Debug;
use Nemundo\Package\Bootstrap\Button\BootstrapButtonColor;
use Nemundo\Package\FontAwesome\Icon\CheckIcon;
use Paranautik\App\VideoWorkflow\Content\Type\Status\VideoProposalStatus;


// Control

// WorkflowController

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

    // current Status



    /*
    public function getNextForm($parentItem = null)
    {


        $nextStatus = $this->getFormStatus();

        if ($nextStatus !== null) {

            if ($nextStatus->checkUserVisibility()) {

                $title = new AdminSubtitle($parentItem);
                $title->content = $nextStatus->contentName;

                $form = $nextStatus->getForm($parentItem);
                $form->parentContentType = $this->process;
                $form->redirectSite = $this->process->getViewSite();

            }

        }

    }


    /*
    public function getFormStatus()
    {

        $formStatus = null;


        if ($this->process->isWorkflowOpen()) {

            $status = $this->process->getStatus();
            if ($status->isDraft()) {
                $formStatus = $status;
            }

            $contentTypeParameter = new ContentTypeParameter();


            if ($contentTypeParameter->exists()) {

                $formStatus = $contentTypeParameter->getContentType();
                $formStatus->parentContentType = $this->process;

            } else {

                $nextStatus2 = $status->getNextContentType();

                if ($nextStatus2 !== null) {
                    $formStatus = $nextStatus2;
                }

            }
        }

        return $formStatus;

    }*/


    public function getHtml()
    {

        $status = $this->process->getStatus();
        //$formStatus = $this->getFormStatus();

        $table = new WorkflowStatusTable($this);


        foreach ($this->process->getChild() as $contentType) {
            if ($contentType->showStatus) {
                $table->addLogWorkflowStatus($contentType);
            }
        }


        if ($this->process->isWorkflowOpen()) {

            /* if ($status->isDraft()) {

                 $dataId = $status->dataId;

                 $btn = new AdminButton($this);
                 $btn->content = 'Weiter';
                 $btn->site = ContentDraftFreigebenSite::$site;
                 $btn->site->addParameter(new DataIdParameter($dataId));
                 $btn->site->addParameter(new ContentTypeParameter($status->contentId));

             } else {*/


            foreach ($status->getNextContentTypeList() as $item) {
                if ($this->formStatus !== null) {
                    if ($item->contentId == $this->formStatus->contentId) {
                        $table->addActiveWorkflowStatus($item);
                    } else {
                        $table->addNextWorkflowStatus($item);
                    }
                } else {
                    $table->addNextWorkflowStatus($item);
                }
            }


            /*
            $contentTypeParameter = new ContentTypeParameter();
            if ($contentTypeParameter->exists()) {
                $table->addActiveWorkflowStatus($contentTypeParameter->getContentType());


            }*/


            /** @var AbstractWorkflowStatus $nextStatus */
            $nextStatus = $status->getNextContentType();

            if ($nextStatus !== null) {

                if ($nextStatus->checkUserVisibility()) {

                    $btn = new AdminButton($this);
                    $btn->content = $nextStatus->contentName;
                    $btn->site = $this->process->getViewSite();
                    $btn->site->addParameter(new ContentTypeParameter($nextStatus->contentId));
                    $btn->color = BootstrapButtonColor::OUTLINE_PRIMARY;
                    $btn->addCssClass('btn-block');

                    if ($this->formStatus !== null) {
                        if ($nextStatus->contentId == $this->formStatus->contentId) {
                            $btn->color = BootstrapButtonColor::SUCCESS;
                        }
                    }

                }

            }


            foreach ($status->getMenuContentType() as $workflowStatus) {


                if ($workflowStatus->checkUserVisibility()) {

                    $btn = new AdminButton($this);
                    $btn->content = $workflowStatus->contentName;
                    $btn->site = $this->process->getViewSite();
                    $btn->site->addParameter(new ContentTypeParameter($workflowStatus->contentId));
                    $btn->color = BootstrapButtonColor::OUTLINE_PRIMARY;
                    $btn->addCssClass('btn-block');

                    if ($this->formStatus !== null) {
                        if ($workflowStatus->contentId == $this->formStatus->contentId) {
                            $btn->color = BootstrapButtonColor::SUCCESS;
                        }
                    }

                }

            }

        }

        //}

        return parent::getHtml();

    }

}