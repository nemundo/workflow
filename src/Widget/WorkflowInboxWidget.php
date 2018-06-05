<?php

namespace Nemundo\Workflow\Widget;


use Nemundo\Admin\Widget\AbstractAdminWidget;
use Nemundo\Com\Container\AbstractHtmlContainerList;
use Nemundo\Dev\App\Widget\AbstractWidget;
use Nemundo\User\Information\UserInformation;
use Nemundo\User\Login\Session\UserIdSession;
use Nemundo\User\Usergroup\UsergroupMembership;
use Nemundo\Workflow\Com\TrafficLight\DateTrafficLight;
use Nemundo\Workflow\Data\UserAssignment\UserAssignmentPaginationReader;
use Nemundo\Workflow\Data\UserAssignment\UserAssignmentReader;
use Nemundo\Workflow\Inbox\WorkflowInboxReader;
use Paranautik\Widget\ParanautikWidget;
use Nemundo\User\Data\User\UserListBox;
use Nemundo\User\Data\Usergroup\UsergroupListBox;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Design\Bootstrap\Dropdown\BootstrapDropdown;
use Nemundo\Design\Bootstrap\Form\BootstrapFormRow;
use Nemundo\Design\Bootstrap\Pagination\BootstrapModelPagination;
use Nemundo\Design\Bootstrap\Table\BootstrapClickableTable;
use Nemundo\Design\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Dev\Application\Data\Application\ApplicationListBox;
use Nemundo\Workflow\Com\OpenClosedWorkflowListBox;
use Nemundo\Workflow\Data\Process\ProcessListBox;
use Nemundo\Workflow\Data\Process\ProcessReader;
use Nemundo\Workflow\Data\Workflow\WorkflowPaginationReader;
use Nemundo\Workflow\Data\Workflow\WorkflowReader;
use Nemundo\Workflow\Data\WorkflowStatusChange\WorkflowStatusChangeReader;
use Nemundo\Workflow\Parameter\ProcessParameter;
use Nemundo\Workflow\Parameter\WorkflowParameter;


// nur Table???

// WorkflowInboxTable
class WorkflowInboxWidget extends AbstractAdminWidget  // AbstractHtmlContainerList  // AbstractWidget ParanautikWidget
{

    public function getHtml()
    {

        //$this->widgetTitle = 'Workflow Inbox';
        $this->widgetTitle = 'Inbox';


        $reader = new WorkflowInboxReader();

        $reader->addUserIdFilter((new UserInformation())->getUserId());
        foreach ((new UsergroupMembership())->getUsergroupIdList() as $usergroupId) {
            $reader->addUsergroupIdFilter($usergroupId);
        }


        /* $reader->model->loadWorkflow();
         $reader->model->workflow->loadWorkflowStatus();
         $reader->model->workflow->loadProcess();
         $reader->filter->andEqual($reader->model->userId, (new UserInformation())->getUserId());
 */


        $table = new BootstrapClickableTable($this);

        $header = new TableHeader($table);
        $header->addEmpty();
        //$header->addText('Prozess');
        $header->addText('Nr.');
        $header->addText('Betreff');
        $header->addText('Status');
        $header->addText('Erledigen bis');
        //$header->addText($workflowReader->model->closed->label);
        //$header->addEmpty();


        foreach ($reader->getData() as $workflowRow) {

            $number = $workflowRow->workflowNumber . ' (' . $workflowRow->process->process . ')';

            $statusText = $workflowRow->workflowStatus->workflowStatusText;

            // $workflowRow->workflowStatus->workflowStatus

            $row = new BootstrapClickableTableRow($table);

            $trafficLight = new DateTrafficLight($row);
            $trafficLight->date = $workflowRow->deadline;

            $row->addText($number);
            $row->addText($workflowRow->subject);
            $row->addText($statusText);
            //$row->addYesNo($workflowRow->closed);

            /*
            $site = clone(WorkflowItemSite::$site);
            $site->addParameter(new WorkflowParameter($workflowRow->id));
            $row->addSite($site);
*/

            //$row->addText($changeRow->user->displayName);

            if ($workflowRow->deadline !== null) {
                $row->addText($workflowRow->deadline->getShortDateLeadingZeroFormat());
            } else {
                $row->addEmpty();
            }


            //$row->addText($changeRow->itemOrder);

            $site = $workflowRow->process->getProcessClassObject()->getApplicationSite();  //$workflowRow->dataId);
            $site->addParameter(new WorkflowParameter($workflowRow->id));
            $row->addClickableSite($site);

        }


        return parent::getHtml();

    }

}