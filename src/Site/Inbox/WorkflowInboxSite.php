<?php

namespace Nemundo\Workflow\Site\Inbox;


use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\User\Information\UserInformation;
use Nemundo\User\Usergroup\UsergroupMembership;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\Com\Process\ProcessDropdown;
use Nemundo\Workflow\Com\Title\WorkflowTitle;
use Nemundo\Workflow\Data\UserAssignment\UserAssignmentCount;
use Nemundo\Workflow\Inbox\WorkflowInboxTable;
use Nemundo\Design\Bootstrap\Layout\BootstrapColumn;
use Nemundo\Design\Bootstrap\Layout\BootstrapRow;
use Nemundo\Design\Bootstrap\Listing\BootstrapHyperlinkList;
use Nemundo\Workflow\App\Workflow\Data\Process\ProcessReader;
use Nemundo\Workflow\Data\UserNotification\UserNotificationCount;
use Nemundo\Workflow\Data\UserNotification\UserNotificationPaginationReader;
use Nemundo\Workflow\Data\UserNotification\UserNotificationReader;
use Nemundo\Workflow\Parameter\NotificationParameter;
use Nemundo\Workflow\App\Workflow\Parameter\ProcessParameter;
use Nemundo\Workflow\App\Workflow\Parameter\WorkflowParameter;
use Nemundo\Workflow\Site\WorkflowNewSite;

class WorkflowInboxSite extends AbstractSite
{

    /**
     * @var WorkflowInboxSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Inbox';
        $this->url = 'inbox';

    }


    protected function registerSite()
    {
        WorkflowInboxSite::$site = $this;
    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $title = new AdminTitle($page);
        $title->content = $this->title;  //'Inbox (Aufgaben)';


        $dropdown = new ProcessDropdown($page);
        $dropdown->redirectSite = WorkflowNewSite::$site;

        $processParameter = new  ProcessParameter();

        $row = new BootstrapRow($page);

        $colLeft = new BootstrapColumn($row);
        $colLeft->columnWidth = 2;

        $colRight = new BootstrapColumn($row);
        $colRight->columnWidth = 10;


        $list = new BootstrapHyperlinkList($colLeft);

        $processReader = new ProcessReader();

        //$reader->addOrder($reader->model->applicationType);

        foreach ($processReader->getData() as $processRow) {

            $count = new UserAssignmentCount();
            $count->model->loadWorkflow();
            $count->filter->andEqual($count->model->userId, (new UserInformation())->getUserId());
            $count->filter->andEqual($count->model->workflow->processId, $processRow->id);
            $count->filter->andEqual($count->model->delete, false);

            //$count->filter->andNotEqual($count->model->notificationStatusId, (new ArchiveNotificationStatus())->uniqueId);

            $totalCount = $count->getCount();

            // if ($totalCount > 0) {*/

            $site = clone(WorkflowInboxSite::$site);

            $site->title = $processRow->process . ' (' . $totalCount . ')';  // $title;
            $site->addParameter(new ProcessParameter($processRow->id));  // NotificationTypeParameter($processRow->id));

            $list->addSite($site);

            //}

        }

        $table = new WorkflowInboxTable($colRight);
        $table->addUserIdFilter((new UserInformation())->getUserId());

        foreach ((new UsergroupMembership())->getUsergroupIdList() as $usergroupId) {
            $table->addUsergroupIdFilter($usergroupId);
        }


        if ($processParameter->exists()) {
            $table->addProcessIdFilter($processParameter->getValue());
        }


        $page->render();

    }

}