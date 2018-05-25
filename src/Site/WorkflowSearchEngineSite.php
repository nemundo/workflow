<?php

namespace Nemundo\Workflow\Site;


use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Design\Bootstrap\Dropdown\BootstrapDropdown;
use Nemundo\Design\Bootstrap\Form\BootstrapFormRow;
use Nemundo\Design\Bootstrap\Pagination\BootstrapModelPagination;
use Nemundo\Design\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\Dev\Application\Data\Application\ApplicationListBox;
use Nemundo\Web\Site\AbstractSite;
use Schleuniger\App\Abweichungsreport\Site\AbweichungsreportNewSite;
use Schleuniger\App\ChangeRequest\Site\ChangeRequestNewSite;
use Schleuniger\App\Kvp\Site\KvpNewSite;
use Nemundo\Workflow\Com\OpenClosedWorkflowListBox;
use Nemundo\Workflow\Data\Workflow\WorkflowPaginationReader;
use Nemundo\Workflow\Data\Workflow\WorkflowReader;
use Nemundo\Workflow\Data\WorkflowStatusChange\WorkflowStatusChangeReader;
use Nemundo\Workflow\Parameter\WorkflowParameter;
use Schleuniger\Com\Table\SchleunigerClickableTable;
use Schleuniger\Template\SchleunigerTemplate;

class WorkflowSearchEngineSite extends AbstractSite
{

    protected function loadSite()
    {

        $this->title = 'Workflow Search';
        $this->url = 'workflow-search';
        //$this->menuActive = false;


    }


    public function loadContent()
    {


        $page = new SchleunigerTemplate();


        $dropdown = new BootstrapDropdown($page);
        $dropdown->addSite(KvpNewSite::$site);
        $dropdown->addSite(ChangeRequestNewSite::$site);
        $dropdown->addSite(AbweichungsreportNewSite::$site);


        $searchForm = new SearchForm($page);

        $row = new BootstrapFormRow($searchForm);

        $applicationListBox = new ApplicationListBox($row);
        $applicationListBox->submitOnChange = true;
        $applicationListBox->value = $applicationListBox->getValue();

        $statusListBox = new OpenClosedWorkflowListBox($row);



        $workflowReader = new WorkflowPaginationReader();
        $workflowReader->paginationLimit = 30;
        $workflowReader->addOrder($workflowReader->model->itemOrder, SortOrder::DESCENDING);

        if ($applicationListBox->getValue() !== '') {
            $workflowReader->filter->andEqual($workflowReader->model->applicationId, $applicationListBox->getValue());
        }

        if (($statusListBox->getValue() == 1) || ($statusListBox->getValue() == '')) {
            $workflowReader->filter->andEqual($workflowReader->model->closed, false);
        }

        if ($statusListBox->getValue() == 2) {
            $workflowReader->filter->andEqual($workflowReader->model->closed, true);
        }


        $table = new SchleunigerClickableTable($page);

        $header = new TableHeader($table);
        $header->addText('Prozess');
        $header->addText($workflowReader->model->workflowNumber->label);
        $header->addText($workflowReader->model->workflowSubject->label);
        $header->addText($workflowReader->model->workflowStatus->label);
        $header->addText($workflowReader->model->closed->label);
        $header->addEmpty();


        foreach ($workflowReader->getData() as $workflowRow) {

            $row = new BootstrapClickableTableRow($table);
            $row->addText($workflowRow->application->applicationType);
            $row->addText($workflowRow->workflowNumber);
            $row->addText($workflowRow->workflowSubject);
            $row->addText($workflowRow->workflowStatus->workflowStatus);
            $row->addYesNo($workflowRow->closed);

            $site = clone(WorkflowItemSite::$site);
            $site->addParameter(new WorkflowParameter($workflowRow->id));
            $row->addSite($site);


            //$row->addText($changeRow->user->displayName);
            //$row->addText($changeRow->dateTime->getShortDateTimeFormat());

            //$row->addText($changeRow->itemOrder);

            $site = $workflowRow->application->getApplicationTypeClassNameObject()->getApplicationSite();  //$workflowRow->dataId);
            $site->addParameter(new WorkflowParameter($workflowRow->id));
            $row->addClickableSite($site);

        }


        $pagination = new BootstrapModelPagination($page);
        $pagination->paginationReader = $workflowReader;


        $page->render();


    }


}