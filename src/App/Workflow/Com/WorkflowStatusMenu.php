<?php

namespace Nemundo\Workflow\App\Workflow\Com;


use Nemundo\Admin\Com\Button\AdminButton;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\App\Content\Parameter\ContentTypeParameter;
use Nemundo\App\Content\Type\Process\AbstractWorkflowProcess;
use Nemundo\Com\Container\AbstractHtmlContainerList;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Core\Debug\Debug;
use Nemundo\Package\Bootstrap\Button\BootstrapButtonColor;
use Nemundo\Package\FontAwesome\Icon\CheckIcon;
use Paranautik\App\VideoWorkflow\Content\Type\Status\VideoProposalStatus;


// Control
class WorkflowStatusMenu extends AbstractHtmlContainerList
{

    /**
     * @var AbstractWorkflowProcess
     */
    public $process;


    public function getNextForm($parentItem = null)
    {


        $status = $this->process->getStatus();

        $contentTypeParameter = new ContentTypeParameter();

        $formContentType = null;

        if ($contentTypeParameter->exists()) {

            $contentType = $contentTypeParameter->getContentType();
            $contentType->parentContentType = $this->process;

            $title = new AdminSubtitle($parentItem);
            $title->content = $contentType->contentName;

            $form = $contentType->getForm($parentItem);
            $form->redirectSite = $this->process->getViewSite();

            $formContentType = $contentType;


        } else {

            $nextStatus = $status->getNextContentType();

            if ($nextStatus !== null) {


                $title = new AdminSubtitle($parentItem);
                $title->content = $nextStatus->contentName;

                $form = $nextStatus->getForm($parentItem);
                $form->parentContentType = $this->process;
                $form->redirectSite = $this->process->getViewSite();

                $formContentType = $nextStatus;

            }

        }


    }


    public function getHtml()
    {


        $formContentType = null;

        $status = $this->process->getStatus();
        //$status = new VideoProposalStatus();
        $formContentType = new VideoProposalStatus();


        //$table = new AdminTable($this);
        $table = new WorkflowStatusTable($this);

        foreach ($this->process->getChild() as $contentType) {

            if ($contentType->showStatus) {
                //$label = $contentType->contentName . ': ' . $contentType->userCreated->displayName;

                $table->addLogWorkflowStatus($contentType);

                /*$row = new TableRow($table);

                new CheckIcon($row);

                //$row->addText($contentType->contentName);
                $row->addText($contentType->getSubject());

                $row->addText($contentType->userCreated->displayName);
                $row->addText($contentType->dateTimeCreated->getShortDateLeadingZeroFormat());*/

            }
        }


        foreach ($status->getNextContentTypeList() as $item) {

            //(new Debug())->write($item->contentName);


            //$row = new TableRow($table);
            //$row->addEmpty();

            // Pfeil rechts Icon

            if ($formContentType !== null) {
                if ($item->contentId == $formContentType->contentId) {
                    //$row->addBoldText($item->contentName);

                    $table->addActiveWorkflowStatus($item);

                } else {
                    //$row->addText($item->contentName);
                    $table->addNextWorkflowStatus($item);
                }
            } else {
                //$row->addText($item->contentName);
                $table->addNextWorkflowStatus($item);
            }


            //$row->addEmpty();
            //$row->addEmpty();


        }


        $nextContentType = $status->getNextContentType();

        if ($nextContentType !== null) {

            $btn = new AdminButton($this);
            $btn->content = $nextContentType->contentName;
            $btn->site = $this->process->getViewSite();
            $btn->site->addParameter(new ContentTypeParameter($nextContentType->contentId));

        }


        foreach ($status->getMenuContentType() as $workflowStatus) {


            $btn = new AdminButton($this);
            $btn->content = $workflowStatus->contentName;
            $btn->site = $this->process->getViewSite();
            $btn->site->addParameter(new ContentTypeParameter($workflowStatus->contentId));
            $btn->color = BootstrapButtonColor::OUTLINE_PRIMARY;
            $btn->addCssClass('btn-block');
            //$btn->addCssClass('btn-default');

            if ($formContentType !== null) {
                if ($workflowStatus->contentId == $formContentType->contentId) {
                    $btn->color = BootstrapButtonColor::SUCCESS;  // addCssClass('btn-success');
                }
            } else {

            }


        }


        return parent::getHtml();
    }

}