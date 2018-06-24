<?php

namespace Nemundo\Workflow\Inbox;


use Nemundo\Com\Container\AbstractHtmlContainerList;
use Nemundo\Com\Html\Basic\Paragraph;
use Nemundo\Design\FontAwesome\Icon\DeleteIcon;
use Nemundo\User\Usergroup\UsergroupMembership;
use Nemundo\Workflow\Builder\StatusChangeEvent;
use Nemundo\Workflow\Com\TrafficLight\DateTrafficLight;
use Nemundo\Workflow\Data\Workflow\WorkflowModel;
use Nemundo\Core\Directory\TextDirectory;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Design\Bootstrap\Pagination\BootstrapModelPagination;
use Nemundo\Design\Bootstrap\Table\BootstrapClickableTable;
use Nemundo\Design\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\Workflow\Data\UserAssignment\UserAssignmentReader;
use Nemundo\Workflow\Data\UsergroupAssignment\UsergroupAssignmentReader;
use Nemundo\Workflow\Data\Workflow\WorkflowPaginationReader;
use Nemundo\Workflow\Parameter\WorkflowParameter;
use Nemundo\Workflow\Site\Search\SearchItemSite;
use Nemundo\Workflow\Site\Workflow\WorkflowDeleteSite;
use Nemundo\Workflow\Usergroup\WorkflowAdministratorUsergroup;


class WorkflowInboxTable extends AbstractHtmlContainerList
{

    use WorkflowInboxTrait;

    public function getHtml()
    {

        $workflowReader = new WorkflowPaginationReader();
        $this->loadReader($workflowReader);

        $workflowReader->model->loadUser();
        $workflowReader->model->loadUserModified();

        $workflowReader->paginationLimit = 30;

        $workflowCount = $this->getWorkflowCount();
        $workflowReader->count = $workflowCount;

        $p = new Paragraph($this);
        $p->content = 'Total Workflow: ' . $workflowCount;

        $table = new BootstrapClickableTable($this);
        $table->smallTable = true;
        $table->hover = true;


        $model = new WorkflowModel();

        $header = new TableHeader($table);
        $header->addEmpty();
        //$header->addText($model->processId->label);
        //$header->addText($model->workflowNumber->label);
        //$header->addText($model->subject->label);

        $header->addText('Prozess');
        $header->addText('Nr.');
        $header->addText('Betreff');
        $header->addText('Status');
        $header->addText('Text');
        $header->addText('Abgeschlossen');
        $header->addText('Erledigen bis');
        $header->addText('Zugewiesen an Benutzer');
        $header->addText('Zugewiesen an Benutzergruppe');
        $header->addText('Ersteller');
        $header->addText('Letzte Änderung');

        if ((new UsergroupMembership())->isMemberOfUsergroup(new WorkflowAdministratorUsergroup())) {
            $header->addEmpty();
        }


        //$header->addText($model->workflowStatusId->label);
        //$header->addText($model->closed->label);
        //$header->addText($model->deadline->label);
        /*$header->addText('Assign to (User)');
        $header->addText('Assign to (Usergroup)');
        $header->addText('Creator');*/

        $header->addEmpty();


        foreach ($workflowReader->getData() as $workflowRow) {

            $row = new BootstrapClickableTableRow($table);

            if (($workflowRow->deadline !== null) && (!$workflowRow->closed)) {
                $trafficLight = new DateTrafficLight($row);
                $trafficLight->date = $workflowRow->deadline;
            } else {
                $row->addEmpty();
            }

            $row->addText($workflowRow->process->process);
            $row->addText($workflowRow->workflowNumber);
            $row->addText($workflowRow->subject);


            $draft = '';
            if ($workflowRow->draft) {
                $draft = ' (Entwurf)';
            }


            $row->addText($workflowRow->workflowStatus->workflowStatus . $draft);

            //$row->addText($workflowRow->workflowStatus->workflowStatusText);


            $changeEvent = new StatusChangeEvent();
            $changeEvent->workflowId = $workflowRow->id;


            $row->addText($workflowRow->workflowStatus->getWorkflowStatusClassObject()->getStatusText($changeEvent));
            $row->addYesNo($workflowRow->closed);

            if ($workflowRow->deadline !== null) {
                $row->addText($workflowRow->deadline->getShortDateLeadingZeroFormat());
            } else {
                $row->addEmpty();
            }

            // User
            $reader = new UserAssignmentReader();
            $reader->model->loadUser();
            $reader->filter->andEqual($reader->model->workflowId, $workflowRow->id);

            $user = new TextDirectory();
            foreach ($reader->getData() as $assignmentRow) {
                $user->addValue($assignmentRow->user->displayName);
            }
            $row->addText($user->getTextWithSeperator());

            // Usergroup
            $reader = new UsergroupAssignmentReader();
            $reader->model->loadUsergroup();
            $reader->filter->andEqual($reader->model->workflowId, $workflowRow->id);

            $usergroup = new TextDirectory();
            foreach ($reader->getData() as $assignmentRow) {
                $usergroup->addValue($assignmentRow->usergroup->usergroup);
            }
            $row->addText($usergroup->getTextWithSeperator());

            $row->addText($workflowRow->user->displayName . ' ' . $workflowRow->dateTime->getShortDateTimeLeadingZeroFormat());
            $row->addText($workflowRow->userModified->displayName . ' ' . $workflowRow->dateTimeModified->getShortDateTimeLeadingZeroFormat());

            //$site = $workflowRow->process->getProcessClassObject()->getApplicationSite();


            $site = clone(SearchItemSite::$site);
            $site->addParameter(new WorkflowParameter($workflowRow->id));

            $row->addClickableSite($site);

            if ((new UsergroupMembership())->isMemberOfUsergroup(new WorkflowAdministratorUsergroup())) {
                $site = clone(WorkflowDeleteSite::$site);
                $site->addParameter(new WorkflowParameter($workflowRow->id));
                $row->addHyperlinkIcon(new DeleteIcon(), $site);
            }

        }

        $pagination = new BootstrapModelPagination($this);
        $pagination->paginationReader = $workflowReader;

        return parent::getHtml();

    }

}