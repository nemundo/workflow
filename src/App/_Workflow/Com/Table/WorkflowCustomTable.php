<?php

namespace Nemundo\Workflow\App\Workflow\Com\Table;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Com\Container\AbstractHtmlContainerList;
use Nemundo\Com\Html\Basic\Paragraph;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Db\Filter\Filter;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Package\FontAwesome\Icon\DeleteIcon;
use Nemundo\User\Usergroup\UsergroupMembership;
use Nemundo\Workflow\App\Workflow\Data\Workflow\WorkflowCount;
use Nemundo\Workflow\App\Workflow\Data\Workflow\WorkflowPaginationReader;
use Nemundo\Workflow\App\Workflow\Site\WorkflowItemAdminSite;
use Nemundo\Workflow\Com\TrafficLight\DateTrafficLight;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Package\Bootstrap\Pagination\BootstrapModelPagination;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\App\Content\Parameter\DataIdParameter;
use Nemundo\Workflow\App\Workflow\Parameter\WorkflowParameter;
use Nemundo\Workflow\App\Workflow\Site\WorkflowItemSite;
use Nemundo\Workflow\App\Workflow\Site\WorkflowDeleteSite;
use Nemundo\Workflow\App\Workflow\Usergroup\WorkflowAdministratorUsergroup;


class WorkflowCustomTable extends AbstractHtmlContainerList
{

    /**
     * @var Filter
     */
    public $filter;


    public function getHtml()
    {

        $workflowReader = new WorkflowPaginationReader();
        $workflowReader->model->loadWorkflowStatus();
        $workflowReader->model->loadProcess();
        //$workflowReader->model->loadIdentificationType();
        $workflowReader->model->loadUser();
        $workflowReader->model->loadUserModified();
        $workflowReader->filter = $this->filter;
        $workflowReader->addOrder($workflowReader->model->dateTime, SortOrder::DESCENDING);
        $workflowReader->paginationLimit = 30;

        $workflowCount = new WorkflowCount();
        $workflowCount->filter = $this->filter;

        $p = new Paragraph($this);
        $p->content = 'Total Workflow: ' . $workflowCount->getCount();

        $table = new AdminClickableTable($this);

        $header = new TableHeader($table);
        $header->addEmpty();
        $header->addText('Prozess');
        $header->addText('Quelle');

        $header->addText('Nr.');
        $header->addText('Betreff');
        $header->addText('Status');
        $header->addText('Abgeschlossen');
        $header->addText('Verantwortlicher');
        $header->addText('Erledigen bis');

        //$header->addText('Zugewiesen an Benutzergruppe');
        $header->addText('Ersteller');
        $header->addText('Letzte Änderung');

        if ((new UsergroupMembership())->isMemberOfUsergroup(new WorkflowAdministratorUsergroup())) {
            $header->addEmpty();
            $header->addEmpty();
        }

        $header->addEmpty();

        foreach ($workflowReader->getData() as $workflowRow) {

            $row = new BootstrapClickableTableRow($table);

            $process = $workflowRow->process->getProcessClassObject();

            if ($process == null) {
                (new LogMessage())->writeError('no process object');
                exit;
            }


            if (($workflowRow->deadline !== null) && (!$workflowRow->closed)) {
                $trafficLight = new DateTrafficLight($row);
                $trafficLight->date = $workflowRow->deadline;
            } else {
                $row->addEmpty();
            }

            $row->addText($workflowRow->process->process);

            $row->addText($process->getSource($workflowRow->dataId));

            $row->addText($workflowRow->workflowNumber);
            $row->addText($workflowRow->subject);


            $draft = '';
            if ($workflowRow->draft) {
                $draft = ' (Entwurf)';
            }

            $row->addText($workflowRow->workflowStatus->contentType . $draft);
            $row->addYesNo($workflowRow->closed);


            $row->addText($workflowRow->assignment->getValue());

            /*
            if ($workflowRow->identificationTypeId !== '') {
                $identificationType = $workflowRow->identificationType->getIdentificationTypeClassObject();
                $row->addText($identificationType->getValue($workflowRow->identificationId));
            } else {
                $row->addEmpty();
            }*/

            if ($workflowRow->deadline !== null) {
                $row->addText($workflowRow->deadline->getShortDateLeadingZeroFormat());
            } else {
                $row->addEmpty();
            }

            $row->addText($workflowRow->user->displayName . ' ' . $workflowRow->dateTime->getShortDateTimeLeadingZeroFormat());
            $row->addText($workflowRow->userModified->displayName . ' ' . $workflowRow->dateTimeModified->getShortDateTimeLeadingZeroFormat());

            $site = clone(WorkflowItemSite::$site);
            $site->addParameter(new WorkflowParameter($workflowRow->id));
            $site->addParameter(new DataIdParameter($workflowRow->dataId));

            $row->addClickableSite($site);

            if ((new UsergroupMembership())->isMemberOfUsergroup(new WorkflowAdministratorUsergroup())) {
                $site = clone(WorkflowDeleteSite::$site);
                $site->addParameter(new WorkflowParameter($workflowRow->id));
                $row->addHyperlinkIcon(new DeleteIcon(), $site);
            }

            $site = $process->getItemSite($workflowRow->dataId);
            if ($site !== null) {
                $site->title = 'Direkt';
                $row->addSite($site);
            }

            $site = clone(WorkflowItemAdminSite::$site);
            $site->addParameter(new WorkflowParameter($workflowRow->id));
            $site->title = 'Item';
            $row->addSite($site);

        }

        $pagination = new BootstrapModelPagination($this);
        $pagination->paginationReader = $workflowReader;

        return parent::getHtml();

    }

}