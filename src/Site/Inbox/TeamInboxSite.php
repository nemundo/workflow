<?php

namespace Nemundo\Workflow\Site\Inbox;


use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Com\Html\Basic\Paragraph;
use Nemundo\Core\Directory\TextDirectory;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\User\Data\User\UserReader;
use Nemundo\User\Data\Usergroup\UsergroupReader;
use Nemundo\User\Information\UserInformation;
use Nemundo\User\Item\UserItem;
use Nemundo\User\Usergroup\UsergroupMembership;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\TeamInbox\Data\TeamUser\TeamUserCount;
use Nemundo\Workflow\App\TeamInbox\Data\TeamUser\TeamUserReader;
use Nemundo\Workflow\Com\Process\ProcessDropdown;
use Nemundo\Workflow\App\Workflow\Com\Title\WorkflowTitle;
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

class TeamInboxSite extends AbstractSite
{

    /**
     * @var TeamInboxSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Team Inbox';
        $this->url = 'team-inbox';

    }


    protected function registerSite()
    {
        TeamInboxSite::$site = $this;
    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $title = new AdminTitle($page);
        $title->content = $this->title;  // 'Inbox (Aufgaben)';


        $count = new TeamUserCount();
        $count->filter->andEqual($count->model->userId, (new UserInformation())->getUserId());
        if ($count->getCount() == 0) {
            $p = new Paragraph($page);
            $p->content = 'Keine Team Mitarbeiter definiert.';
        } else {

            $p = new Paragraph($page);

            //$dropdown = new ProcessDropdown($page);
            //$dropdown->redirectSite = WorkflowNewSite::$site;

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

                /*$count = new UserAssignmentCount();
                $count->model->loadWorkflow();
                $count->filter->andEqual($count->model->userId, (new UserInformation())->getUserId());
                $count->filter->andEqual($count->model->workflow->processId, $processRow->id);
                //$count->filter->andNotEqual($count->model->notificationStatusId, (new ArchiveNotificationStatus())->uniqueId);

                $totalCount = $count->getCount();

                if ($totalCount > 0) {*/


                $process = $processRow->getProcessClassObject();

                if ($process->checkUserVisibility()) {


                    $site = clone(WorkflowInboxSite::$site);

                    $site->title = $processRow->process;  // . ' (' . $totalCount . ')';  // $title;
                    $site->addParameter(new ProcessParameter($processRow->id));  // NotificationTypeParameter($processRow->id));

                    $list->addSite($site);
                }

                //}

            }


            $table = new WorkflowInboxTable($colRight);


            $userList = new TextDirectory();

            $reader = new TeamUserReader();
            $reader->filter->andEqual($reader->model->userId, (new UserInformation())->getUserId());
            foreach ($reader->getData() as $userRow) {
                $table->addUserIdFilter($userRow->teamUserId);
                $userList->addValue($userRow->teamUser->displayName);

                $userItem = new UserItem($userRow->teamUserId);
                foreach ($userItem->getUsergroup() as $usergroup) {
                    $table->addUsergroupIdFilter($usergroup->id);
                }

            }


            $p->content = 'Team: ' . $userList->getTextWithSeperator(', ');


            if ($processParameter->exists()) {
                $table->addProcessIdFilter($processParameter->getValue());
            }

        }

        $page->render();

    }

}