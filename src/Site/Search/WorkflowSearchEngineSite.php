<?php

namespace Nemundo\Workflow\Site\Search;


use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Design\Bootstrap\Breadcrumb\BootstrapBreadcrumb;
use Nemundo\Design\Bootstrap\Form\BootstrapFormRow;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\Com\OpenClosedWorkflowListBox;
use Nemundo\User\Data\User\UserListBox;
use Nemundo\User\Data\Usergroup\UsergroupListBox;
use Nemundo\Workflow\Com\Process\ProcessDropdown;
use Nemundo\Workflow\Data\Process\ProcessListBox;
use Nemundo\Workflow\Inbox\WorkflowInboxTable;
use Nemundo\Workflow\Inbox\WorkflowSorting;
use Nemundo\Workflow\Inbox\WorkflowStatus;


class WorkflowSearchEngineSite extends AbstractSite
{

    /**
     * @var WorkflowSearchEngineSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Workflow Search';
        $this->url = 'workflow-search';

        new SearchNewSite($this);
        new SearchItemSite($this);
        new SearchStatusChangeSite($this);

    }


    protected function registerSite()
    {
        WorkflowSearchEngineSite::$site = $this;
    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();


        $breadcrumb = new BootstrapBreadcrumb($page);
        $breadcrumb->addActiveItem('Workflow Search');




        $dropdown =  new ProcessDropdown($page);
        $dropdown->redirectSite = SearchNewSite::$site;

        $searchForm = new SearchForm($page);

        $row = new BootstrapFormRow($searchForm);

        $processListBox = new ProcessListBox($row);
        $processListBox->submitOnChange = true;
        $processListBox->value = $processListBox->getValue();

        $statusListBox = new OpenClosedWorkflowListBox($row);

        $userListBox = new UserListBox($row);
        $userListBox->label = 'User Assignment';
        $userListBox->submitOnChange = true;
        $userListBox->value = $userListBox->getValue();

        $usergroupListBox = new UsergroupListBox($row);
        $usergroupListBox->label = 'Usergroup Assignment';
        $usergroupListBox->submitOnChange = true;
        $usergroupListBox->value = $usergroupListBox->getValue();

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


        $table->sorting = WorkflowSorting::BY_ITEM_ORDER_DESC;

        $page->render();

    }

}