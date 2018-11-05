<?php

namespace Nemundo\Workflow\App\Assignment\Com\Table;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Table\Header\SortingHyperlink;
use Nemundo\Admin\Com\Table\Header\UpDownSortingHyperlink;
use Nemundo\App\Content\Type\AbstractContentType;
use Nemundo\App\Content\Type\AbstractTreeContentType;
use Nemundo\Com\Container\AbstractHtmlContainerList;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Db\Filter\Filter;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Package\Bootstrap\Pagination\BootstrapModelPagination;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\Project\Usergroup\SystemAdministratorUsergroup;
use Nemundo\User\Usergroup\UsergroupMembership;
use Nemundo\Workflow\App\Assignment\Data\Assignment\AssignmentPaginationReader;
use Nemundo\Workflow\App\Assignment\Parameter\AssignmentParameter;
use Nemundo\Workflow\App\Assignment\Site\AssignmentDeleteSite;
use Nemundo\Workflow\App\Identification\Config\IdentificationConfig;
use Nemundo\Workflow\Com\TrafficLight\DateTrafficLight;

class AssignmentTable extends AbstractHtmlContainerList
{

    /**
     * @var Filter
     */
    public $filter;

    /**
     * @var bool
     */
    public $showAssignment = true;

    public $showArchive = true;


    private $userIdList = [];

    public function addUserId($userId)
    {
        $this->userIdList[] = $userId;
        return $this;
    }


    public function getHtml()
    {

        $assignmentReader = new AssignmentPaginationReader();

        if ($this->filter !== null) {
            $assignmentReader->filter = $this->filter;
        }

        $assignmentReader->paginationLimit = 30;


        if (sizeof($this->userIdList) > 0) {
            $filter = new Filter();
            foreach ($this->userIdList as $userId) {

                foreach ((new IdentificationConfig())->getIdentificationList() as $identification) {

                    foreach ($identification->getIdentificationIdFromUserId($userId) as $value) {
                        $filter->orEqual($assignmentReader->model->assignment->identificationId, $value);
                    }

                }

            }

            $assignmentReader->filter->andFilter($filter);

        }


        //$assignmentReader->filter->andEqual($assignmentReader->model->archive, false);

        //$assignmentReader->addOrder($assignmentReader->model->id, SortOrder::DESCENDING);

        //$assignmentReader->limit = 20;

        $table = new AdminClickableTable($this);

        $header = new TableHeader($table);
        $header->addEmpty();
        $header->addText('Quelle');

        $subjectSorting = new UpDownSortingHyperlink($header);
        $subjectSorting->fieldType = $assignmentReader->model->subject;
        $subjectSorting->checkSorting($assignmentReader);

        $header->addText('Nachricht');

        $assignmentSorting = new UpDownSortingHyperlink($header);
        $assignmentSorting->fieldType = $assignmentReader->model->assignmentText;
        $assignmentSorting->checkSorting($assignmentReader);

        $deadlineSorting = new UpDownSortingHyperlink($header);
        $deadlineSorting->fieldType = $assignmentReader->model->deadline;
        $deadlineSorting->checkSorting($assignmentReader);


        $header->addText('Ersteller');
        if ($this->showArchive) {
            //$header->addText('Archiviert');
            $header->addText('Abgeschlossen');
        }


        foreach ($assignmentReader->getData() as $assignmentRow) {

            $row = new BootstrapClickableTableRow($table);

            $className = $assignmentRow->contentType->contentTypeClass;

            /** @var AbstractTreeContentType $contentType */
            $contentType = new $className($assignmentRow->dataId);

            if ($assignmentRow->deadline !== null) {
                $trafficLight = new DateTrafficLight($row);
                $trafficLight->date = $assignmentRow->deadline;
            } else {
                $row->addEmpty();
            }

            $row->addText($assignmentRow->source);
            $row->addText($assignmentRow->subject);


            $row->addText($assignmentRow->message);
            $row->addText($assignmentRow->assignment->getValue());

            if ($assignmentRow->deadline !== null) {
                $row->addText($assignmentRow->deadline->getShortDateLeadingZeroFormat());
            } else {
                $row->addEmpty();
            }

            $row->addText($assignmentRow->userCreated->displayName . ' ' . $assignmentRow->dateTimeCreated->getShortDateTimeLeadingZeroFormat());

            if ($this->showArchive) {
                $row->addYesNo($assignmentRow->archive);
            }


            if ((new UsergroupMembership())->isMemberOfUsergroup(new SystemAdministratorUsergroup())) {
                $site = clone(AssignmentDeleteSite::$site);
                $site->addParameter(new AssignmentParameter($assignmentRow->id));
                $row->addIconSite($site);
            }


            if ($contentType !== null) {
                $site = $contentType->getViewSite();

                if ($site !== null) {
                    $row->addClickableSite($site);
                } else {
                    (new LogMessage())->writeError('No Site');
                }
            } else {
                (new LogMessage())->writeError('No Content Type');
            }

        }

        $pagination = new BootstrapModelPagination($this);
        $pagination->paginationReader = $assignmentReader;

        return parent::getHtml();

    }

}