<?php

namespace Nemundo\Workflow\App\Assignment\Com\Table;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Table\Header\UpDownSortingHyperlink;
use Nemundo\Admin\Parameter\SortingParameter;
use Nemundo\App\Content\Type\AbstractTreeContentType;
use Nemundo\Core\Language\LanguageCode;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Db\Filter\Filter;
use Nemundo\Package\Bootstrap\Pagination\BootstrapPagination;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\Project\Usergroup\SystemAdministratorUsergroup;
use Nemundo\User\Usergroup\UsergroupMembership;
use Nemundo\Workflow\App\Assignment\Data\Assignment\AssignmentPaginationModelReader;
use Nemundo\Workflow\App\Assignment\Data\Assignment\AssignmentPaginationReader;
use Nemundo\Workflow\App\Assignment\Parameter\AssignmentParameter;
use Nemundo\Workflow\App\Assignment\Site\AssignmentDeleteSite;
use Nemundo\Workflow\App\Identification\Config\IdentificationConfig;
use Nemundo\Workflow\Com\TrafficLight\DateTrafficLight;

class AssignmentTable extends AbstractHtmlContainer
{

    /**
     * @var Filter
     */
    public $filter;

    /**
     * @var bool
     */
    public $showAssignment = true;

    /**
     * @var bool
     */
    public $showArchive = true;

    /**
     * @var bool
     */
    public $showIdentificationType = false;

    /**
     * @var bool
     */
    public $showDebug = false;


    private $userIdList = [];

    public function addUserId($userId)
    {
        $this->userIdList[] = $userId;
        return $this;
    }


    public function getContent()
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


        if (!$this->showArchive) {
            $assignmentReader->filter->andEqual($assignmentReader->model->archive, false);
        }


        $table = new AdminClickableTable($this);

        $header = new AdminTableHeader($table);
        $header->addEmpty();
        $header->addText('Source');
        //$header->addText('Quelle');

        /*
        $subjectSorting = new UpDownSortingHyperlink($header);
        $subjectSorting->fieldType = $assignmentReader->model->subject;
        $subjectSorting->label[LanguageCode::EN] = 'Subject';
        $subjectSorting->label[LanguageCode::DE] = 'Betreff';
        $subjectSorting->checkSorting($assignmentReader);*/

        $header->addText('Subject');
        $header->addText('Message');
        //$header->addText('Nachricht');


        if ($this->showIdentificationType) {
            $header->addText('Identification Type');
        }



        $assignmentSorting = new UpDownSortingHyperlink($header);
        $assignmentSorting->fieldType = $assignmentReader->model->assignmentText;
        $assignmentSorting->checkSorting($assignmentReader);

        $deadlineSorting = new UpDownSortingHyperlink($header);
        $deadlineSorting->fieldType = $assignmentReader->model->deadline;
        $deadlineSorting->label[LanguageCode::EN] = 'Deadline';
        $deadlineSorting->label[LanguageCode::DE] = 'Erledigen bis';
        $deadlineSorting->label[LanguageCode::DE] = 'Erledigen bis';
        $deadlineSorting->checkSorting($assignmentReader);


        $header->addText('Ersteller');
        if ($this->showArchive) {
            //$header->addText('Archiviert');
            $header->addText('Abgeschlossen');
        }


        if ($this->showDebug) {

            $header->addText('Content Type');
            $header->addText('Source Type');


        }



        if ((new SortingParameter())->notExists()) {
            $assignmentReader->addOrder($assignmentReader->model->deadline, SortOrder::DESCENDING);
            $assignmentReader->addOrder($assignmentReader->model->dateTimeCreated, SortOrder::DESCENDING);
        }


        foreach ($assignmentReader->getData() as $assignmentRow) {

            $row = new BootstrapClickableTableRow($table);

            //$className = $assignmentRow->contentType->contentTypeClass;

            /** @var AbstractTreeContentType $contentType */
            //$contentType = new $className($assignmentRow->dataId);


            $contentType = $assignmentRow->getContentType();

            if ($assignmentRow->deadline !== null) {
                $trafficLight = new DateTrafficLight($row);
                $trafficLight->date = $assignmentRow->deadline;
            } else {
                $row->addEmpty();
            }




//            $row->addText('Tmp'.$assignmentRow->contentType->contentType);

            //$row->addText($assignmentRow->source);

            $row->addText($contentType->getSource());

            $row->addText($contentType->getSubject());


            //$row->addText($assignmentRow->subject);



            $row->addText($assignmentRow->message);

            if ($this->showIdentificationType) {
                $row->addText($assignmentRow->assignment->identificationType->identification);
            }

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


            if ($this->showDebug) {

                $row->addText($assignmentRow->contentType->contentTypeClass);


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

        $pagination = new BootstrapPagination($this);
        $pagination->paginationReader = $assignmentReader;

        return parent::getContent();

    }

}