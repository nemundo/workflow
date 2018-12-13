<?php

namespace Nemundo\Workflow\App\Workflow\Site;

use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\App\Content\Type\Process\AbstractWorkflowProcess;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Package\Bootstrap\Form\BootstrapFormRow;
use Nemundo\Package\Bootstrap\Pagination\BootstrapModelPagination;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\Workflow\Com\ListBox\OpenClosedWorkflowListBox;
use Nemundo\Workflow\App\Workflow\Data\Process\ProcessListBox;
use Nemundo\Workflow\App\Workflow\Data\Workflow\WorkflowPaginationReader;

class WorkflowSite extends AbstractSite
{
    protected function loadSite()
    {
        $this->title = 'Workflow';
        $this->url = 'workflow';
    }

    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();


        // search

        $searchForm = new SearchForm($page);

        $row = new BootstrapFormRow($searchForm);

        $statusListBox = new OpenClosedWorkflowListBox($row);

        $processListBox = new ProcessListBox($row);
        $processListBox->submitOnChange = true;
        $processListBox->value = $processListBox->getValue();


        $table = new AdminClickableTable($page);

        $header = new TableHeader($table);
        $header->addText('Closed');
        $header->addText('Process');
        $header->addText('Subject');
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

            $row->addText($workflowRow->userCreated->displayName);
            $row->addText($workflowRow->dateTimeCreated->getShortDateTimeLeadingZeroFormat());

            $row->addClickableSite($process->getViewSite());


        }


        $pagination = new BootstrapModelPagination($page);
        $pagination->paginationReader = $workflowReader;


        $page->render();

    }
}