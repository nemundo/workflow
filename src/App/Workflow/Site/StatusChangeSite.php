<?php

namespace Nemundo\Workflow\App\Workflow\Site;


use Nemundo\App\Content\Data\ContentType\ContentTypeReader;
use Nemundo\Core\Debug\Debug;
use Nemundo\Design\Bootstrap\Breadcrumb\BootstrapBreadcrumb;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Workflow\App\Workflow\Builder\WorkflowItem;
use Nemundo\Workflow\App\Workflow\Container\Change\WorkflowStatusChangeContainer;
use Nemundo\Com\Html\Hyperlink\Hyperlink;
use Nemundo\Workflow\App\Workflow\Event\WorkflowEvent;
use Nemundo\Workflow\Com\Title\WorkflowTitle;
use Nemundo\Workflow\App\Workflow\Data\WorkflowStatus\WorkflowStatusReader;
use Nemundo\Workflow\Parameter\WorkflowParameter;
use Nemundo\Workflow\Parameter\WorkflowStatusParameter;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractDataListWorkflowStatus;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractFormWorkflowStatus;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractWorkflowStatus;


class StatusChangeSite extends AbstractSite
{

    /**
     * @var StatusChangeSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->url = 'status-change';
        $this->menuActive = false;

    }


    protected function registerSite()
    {
        StatusChangeSite::$site = $this;
    }


    public function loadContent()
    {


        $workflowStatusId = (new WorkflowStatusParameter())->getValue();

        $workflowStatusRow = (new ContentTypeReader())->getRowById($workflowStatusId);

        /** @var AbstractWorkflowStatus|AbstractDataListWorkflowStatus|AbstractFormWorkflowStatus $workflowStatus */
        $workflowStatus = $workflowStatusRow->getContentTypeClassObject();

        $workflowParameter = new WorkflowParameter();
        $workflowId = $workflowParameter->getValue();

        $workflowItem = new WorkflowItem($workflowId);

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        /*$link = new Hyperlink($page);
        $link->content = 'Back (Search Engine)';
        $link->site = clone(WorkflowSearchEngineSite::$site);

        $link = new Hyperlink($page);
        $link->content = 'Back';
        $link->site = clone(SearchItemSite::$site);
        $link->site->addParameter($workflowParameter);*/

        $breadcrumb = new BootstrapBreadcrumb($page);
        $breadcrumb->addItem(WorkflowSearchSite::$site);

        $site = clone(WorkflowItemSite::$site);
        $site->title = $workflowItem->getTitle();
        $site->addParameter($workflowParameter);
        $breadcrumb->addItem($site);

        $breadcrumb->addActiveItem($workflowStatus->name);


        $title = new WorkflowTitle($page);
        $title->workflowId = $workflowId;


        $redirectSite = WorkflowItemSite::$site;
        $redirectSite->addParameter(new WorkflowParameter($workflowId));

        $event = new WorkflowEvent();
        $event->workflowStatus = $workflowStatus;
        $event->workflowId = $workflowId;

        $form = $workflowStatus->getForm();

        if ($form == null) {
            $event->run(null);
            $redirectSite->redirect();
        } else {
            $page->addCom($form);
            //$form->afterSubmitEvent = $event;

            $form->afterSubmitEvent->addEvent($event);
            $form->redirectSite = $redirectSite;


        }


        /*


        /*
        $container = new WorkflowStatusChangeContainer($page);
        $container->workflowStatus = $workflowStatus;
        $container->workflowId = $workflowId;
        //$container->redirectSite = WorkflowSearchEngineSite::$site;
        $container->redirectSite = WorkflowItemSite::$site;
        $container->redirectToItemSite = true;*/

        $page->render();

    }

}