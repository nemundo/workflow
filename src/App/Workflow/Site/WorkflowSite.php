<?php

namespace Nemundo\Workflow\App\Workflow\Site;

use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Workflow\App\Workflow\Content\Process\AbstractWorkflowProcess;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Package\Bootstrap\Form\BootstrapFormRow;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Package\Bootstrap\Pagination\BootstrapPagination;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\Workflow\Com\Breadcrumb\WorkflowBreadcrumb;
use Nemundo\Workflow\App\Workflow\Com\ListBox\OpenClosedWorkflowListBox;
use Nemundo\Workflow\App\Workflow\Data\Process\ProcessListBox;
use Nemundo\Workflow\App\Workflow\Data\Workflow\WorkflowPaginationReader;
use Nemundo\Workflow\App\Workflow\Parameter\ProcessParameter;
use Nemundo\Workflow\App\Workflow\Parameter\WorkflowParameter;
use Nemundo\Workflow\App\Workflow\Site\Delete\WorkflowStatusDeleteSite;

class WorkflowSite extends AbstractSite
{

    /**
     * @var WorkflowSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Workflow';
        $this->url = 'workflow';

        new WorkflowItemSite($this);
        new WorkflowStatusDeleteSite($this);

    }


    protected function registerSite()
    {
        WorkflowSite::$site = $this;
    }

    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();


        $breadcrumb = new WorkflowBreadcrumb($page);


        $layout = new BootstrapTwoColumnLayout($page);





        // search

        $searchForm = new SearchForm($layout->col1);

        $row = new BootstrapFormRow($searchForm);

        $statusListBox = new OpenClosedWorkflowListBox($row);

        $processListBox = new ProcessListBox($row);
        $processListBox->submitOnChange = true;
        $processListBox->value = $processListBox->getValue();


        $table = new AdminClickableTable($layout->col1);

        $header = new TableHeader($table);
        $header->addText('Closed');
        $header->addText('Process');
        $header->addText('Subject');
        $header->addText('Status');
        $header->addText('Creator');
        $header->addText('Date/Time');

        $workflowReader = new WorkflowPaginationReader();
        $workflowReader->model->loadProcess();
        $workflowReader->model->loadUserCreated();

        if ($processListBox->getValue() !== '') {
            $workflowReader->filter->andEqual($workflowReader->model->processId, $processListBox->getValue());
        }

        if ($statusListBox->isOpen()) {
            $workflowReader->filter->andEqual($workflowReader->model->closed, false);
        }

        if ($statusListBox->isCloesed()) {
            $workflowReader->filter->andEqual($workflowReader->model->closed, true);
        }

        $workflowReader->addOrder($workflowReader->model->dateTimeCreated, SortOrder::DESCENDING);
        $workflowReader->paginationLimit = 40;

        foreach ($workflowReader->getData() as $workflowRow) {

            $row = new BootstrapClickableTableRow($table);
            $row->addYesNo($workflowRow->closed);
            $row->addText($workflowRow->process->process);

            $className = $workflowRow->process->processClass;

            /** @var AbstractWorkflowProcess $process */
            $process = new $className($workflowRow->dataId);


            $row->addText($process->getSubject());
            $row->addText($process->getCurrentStatus()->getSubject());


            $row->addText($workflowRow->userCreated->displayName);
            $row->addText($workflowRow->dateTimeCreated->getShortDateTimeLeadingZeroFormat());


            $site = clone(WorkflowItemSite::$site);
            $site->addParameter(new ProcessParameter($workflowRow->processId));
            $site->addParameter(new WorkflowParameter($workflowRow->dataId));
            $row->addClickableSite($site);

            //$row->addClickableSite($process->getViewSite());


            /*$site = clone(WorkflowSite::$site);
            $site->addParameter(new WorkflowParameter($workflowRow->id));
            $row->addClickableSite($site);*/


        }


        $pagination = new BootstrapPagination($page);
        $pagination->paginationReader = $workflowReader;


        /*
        $workflowParameter = new WorkflowParameter();
        if ($workflowParameter->exists()) {

            $workflowReader = new WorkflowReader();
            $workflowReader->model->loadProcess();
            $workflowRow = $workflowReader->getRowById($workflowParameter->getValue());

            $className = $workflowRow->process->processClass;

            /** @var AbstractWorkflowProcess $process */
       /*     $process = new $className($workflowRow->dataId);

            $title = new AdminTitle($layout->col2);
            $title->content = $process->getSubject();

            $btn = new BootstrapSiteButton($layout->col2);
            $btn->site = $process->getViewSite();


            $table = new AdminTable($layout->col2);


            foreach ($process->getChild() as $child) {

                $row = new TableRow($table);
                $row->addText($child->getSubject());
                $row->addText($child->userCreated->displayName);
                $row->addText($child->dateTimeCreated->getShortDateTimeLeadingZeroFormat());

                $site = clone(WorkflowStatusDeleteSite::$site);
                $site->addParameter(new ContentLogParameter($child->logId));
                $row->addIconSite($site);


            }


        }*/


        $page->render();

    }
}