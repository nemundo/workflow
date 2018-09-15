<?php

namespace Nemundo\Workflow\App\Workflow\Site;


use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Package\Bootstrap\Breadcrumb\BootstrapBreadcrumb;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Workflow\App\Task\Data\Task\TaskReader;
use Nemundo\Workflow\App\Task\Data\Task\TaskTable;
use Nemundo\Workflow\App\Workflow\Builder\WorkflowItem;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractWorkflowStatus;
use Nemundo\Workflow\App\Workflow\Data\StatusChange\StatusChangeReader;
use Nemundo\Workflow\App\Workflow\Data\Workflow\WorkflowReader;
use Nemundo\Workflow\App\Workflow\Com\Button\WorkflowActionButton;
use Nemundo\Workflow\Item\AbstractProcessItem;
use Nemundo\Workflow\App\Workflow\Parameter\ProcessParameter;
use Nemundo\Workflow\App\Workflow\Parameter\WorkflowParameter;


class WorkflowItemSite extends AbstractSite
{

    /**
     * @var WorkflowItemSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->url = 'item';
        $this->menuActive = false;

    }


    protected function registerSite()
    {
        WorkflowItemSite::$site = $this;
    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();


        $workflowId = (new WorkflowParameter())->getValue();

        $workflowItem = new WorkflowItem($workflowId);


        $workflowReader = new WorkflowReader();
        $workflowReader->model->loadProcess();
        $workflowRow = $workflowReader->getRowById($workflowId);

        $process = $workflowRow->process->getProcessClassObject();


        $breadcrumb = new BootstrapBreadcrumb($page);
        $breadcrumb->addItem(WorkflowSite::$site);

        $site = clone(WorkflowSite::$site);
        $site->title = $process->contentName;
        $site->addParameter(new ProcessParameter($process->contentId));
        $breadcrumb->addItem($site);

        $breadcrumb->addActiveItem($workflowItem->getTitle());


        $title = new AdminTitle($page);
        $title->content = $workflowItem->getTitle();
        //$workflowItem->getWorkflowNumber().' '.$workflowItem->getSubject();


        //$title = new ProcessTitle($page);
        //$title->process = $process;

        $title = new AdminTitle($page);
        $title->content = $process->contentName;

        $item = $process->getView($page);
        $item->dataId = $workflowRow->dataId;
        $item->statusChangeRedirectSite = StatusChangeSite::$site;


        if (!$workflowRow->draft) {
            $actionButton = new WorkflowActionButton($page);
            $actionButton->workflowId = $workflowId;
            $actionButton->statusChangeRedirectSite = StatusChangeSite::$site;
        }


        /*

        $table = new TaskTable($page);
        $table->filter->andEqual($table->model->sourceId, $workflowId);*/



        $title = new AdminTitle($page);
        $title->content = 'Workflow Log';

        $table = new AdminTable($page);

        $header = new TableHeader($table);
        $header->addText('Status');
        $header->addText('Status Text');
        $header->addText('Date/Time');
        $header->addText('User');
        $header->addText('Assign to');


        $statusChangeReader = new StatusChangeReader();
        $statusChangeReader->model->loadWorkflowStatus();
        $statusChangeReader->model->loadUser();
        $statusChangeReader->filter->andEqual($statusChangeReader->model->workflowId, $workflowId);
        foreach ($statusChangeReader->getData() as $statusChangeRow) {

            /** @var AbstractWorkflowStatus $workflowStatus */
            $workflowStatus = $statusChangeRow->workflowStatus->getContentTypeClassObject();

            $row = new TableRow($table);
            //$row->addText($statusChangeRow->workflowStatus->contentType);
            $row->addText($workflowStatus->getStatusText($statusChangeRow->dataId));
            $row->addText($workflowStatus->getSubject($statusChangeRow->dataId));

            $row->addText($statusChangeRow->dateTime->getShortDateTimeLeadingZeroFormat());
            $row->addText($statusChangeRow->user->displayName);
            $row->addText($statusChangeRow->assignment->getValue());


        }






        $page->render();

    }


}