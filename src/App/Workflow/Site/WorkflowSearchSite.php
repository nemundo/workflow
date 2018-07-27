<?php

namespace Nemundo\Workflow\App\Workflow\Site;


use Nemundo\Admin\Com\Button\AdminButton;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Design\Bootstrap\Breadcrumb\BootstrapBreadcrumb;
use Nemundo\Design\Bootstrap\Form\BootstrapFormRow;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\Workflow\Com\Dropdown\ProcessRedirectDropdown;
use Nemundo\Workflow\App\Workflow\Com\Table\WorkflowCustomTable;
use Nemundo\Workflow\App\Workflow\Form\WorkflowSearchForm;
use Nemundo\Workflow\App\Workflow\Data\Process\ProcessReader;
use Nemundo\Workflow\App\Workflow\Parameter\ProcessParameter;


class WorkflowSearchSite extends AbstractSite
{

    /**
     * @var WorkflowSearchSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Workflow';
        $this->url = 'workflow-search';

        new WorkflowNewSite($this);
        new WorkflowItemSite($this);
        new WorkflowItemAdminSite($this);
        new StatusChangeSite($this);
        new WorkflowDeleteSite($this);
        new DraftReleaseSite($this);

    }


    protected function registerSite()
    {
        WorkflowSearchSite::$site = $this;
    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();


        $breadcrumb = new BootstrapBreadcrumb($page);


        $processParameter = new ProcessParameter();

        if ($processParameter->getValue() !== '') {

            $breadcrumb->addItem(WorkflowSearchSite::$site);

            $processRow = (new ProcessReader())->getRowById($processParameter->getValue());
            $breadcrumb->addActiveItem($processRow->process);

            //$site = clone(WorkflowSearchEngineSite::$site);

            $btn = new AdminButton($page);
            $btn->content = 'Neu (' . $processRow->process . ')';
            $btn->site = clone(WorkflowNewSite::$site);
            $btn->site->addParameter($processParameter);


        } else {

            $breadcrumb->addItem(WorkflowSearchSite::$site);  //'Workflow Suche');


            //$breadcrumb->addActiveItem(WorkflowSearchSite::$site->title);  //'Workflow Suche');

            $dropdown = new ProcessRedirectDropdown($page);
            $dropdown->redirectSite = WorkflowNewSite::$site;


        }


        $searchForm = new WorkflowSearchForm($page);

        /*
        $searchForm = new SearchForm($page);

        $row = new BootstrapFormRow($searchForm);

        $processListBox = new ProcessListBox($row);
        $processListBox->name = (new ProcessParameter())->getParameterName();
        $processListBox->label = 'Prozess';
        $processListBox->submitOnChange = true;
        $processListBox->value = $processListBox->getValue();

        $statusListBox = new OpenClosedWorkflowListBox($row);

        $userListBox = new UserListBox($row);
        //$userListBox->label = 'User Assignment';
        $userListBox->label = 'Benutzer Zuweisung';
        $userListBox->submitOnChange = true;
        $userListBox->value = $userListBox->getValue();

        $usergroupListBox = new UsergroupListBox($row);
        //$usergroupListBox->label = 'Usergroup Assignment';
        $usergroupListBox->label = 'Benutzergruppe Zuweisung';
        $usergroupListBox->submitOnChange = true;
        $usergroupListBox->value = $usergroupListBox->getValue();*/


        $table  = new WorkflowCustomTable($page);
        $table->filter = $searchForm->getFilter();


        /*
        $table = new WorkflowInboxTable($page);

        if ($statusListBox->getValue() == 1) {
            $table->status = WorkflowStatus::SHOW_OPEN;
        }

        if ($statusListBox->getValue() == 2) {
            $table->status = WorkflowStatus::SHOW_CLOSED;
        }

        if ($processListBox->getValue() !== '') {
            $table->addProcessIdFilter($processListBox->getValue());
        }

        if ($usergroupListBox->getValue() !== '') {
            $table->addUsergroupIdFilter($usergroupListBox->getValue());
        }

        if ($userListBox->getValue() !== '') {
            $table->addUserIdFilter($userListBox->getValue());
        }

        $table->sorting = WorkflowSorting::BY_ITEM_ORDER_DESC;*/

        $page->render();

    }

}