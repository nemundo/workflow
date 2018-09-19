<?php

namespace Nemundo\Workflow\App\Workflow\Site\StatusChange;


use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Model\Form\ModelFormUpdate;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractWorkflowStatus;
use Nemundo\Workflow\App\Workflow\Data\StatusChange\StatusChangeReader;
use Nemundo\Workflow\App\Workflow\Event\WorkflowEvent;
use Nemundo\Workflow\App\Workflow\Parameter\StatusChangeParameter;

class StatusChangeUpdateSite extends AbstractSite
{

    /**
     * @var StatusChangeUpdateSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->url = 'status-change-update';
        $this->menuActive = false;
    }


    protected function registerSite()
    {
        StatusChangeUpdateSite::$site = $this;
    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $reader = new StatusChangeReader();
        $reader->model->loadWorkflow();
        $reader->model->loadWorkflowStatus();
        $statusChangeRow = $reader->getRowById((new StatusChangeParameter())->getValue());

        $title = new AdminTitle($page);
        $title->content = $statusChangeRow->workflow->workflowNumber . ' ' . $statusChangeRow->workflow->subject;

        $title = new AdminSubtitle($page);
        $title->content = $statusChangeRow->workflowStatus->contentType;

        /** @var AbstractWorkflowStatus $worklfowStatus */
        $worklfowStatus = $statusChangeRow->workflowStatus->getContentTypeClassObject();

        /** @var ModelFormUpdate $form */
        $form = $worklfowStatus->getFormUpdate($page);
        $form->updateId = $statusChangeRow->dataId;


        $worklfowStatus->workflowId = $statusChangeRow->workflowId;
        $worklfowStatus->onCreate($statusChangeRow->dataId);


        /*
        $event = new WorkflowEvent();
        $event->workflowId = $statusChangeRow->workflowId;
        $event->workflowStatus = $worklfowStatus;
        $event->run($statusChangeRow->dataId);*/


        $page->render();


    }


}