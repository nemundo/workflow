<?php

namespace Nemundo\Workflow\App\Assignment\Com\Table;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\App\Content\Type\AbstractContentType;
use Nemundo\App\Content\Type\AbstractTreeContentType;
use Nemundo\Com\Container\AbstractHtmlContainerList;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Db\Filter\Filter;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Package\Bootstrap\Pagination\BootstrapModelPagination;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\Workflow\App\Assignment\Data\Assignment\AssignmentPaginationReader;
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
            $assignmentReader->filter->andEqual($assignmentReader->model->archive, false);
        }





        $assignmentReader->addOrder($assignmentReader->model->id, SortOrder::DESCENDING);

        //$assignmentReader->limit = 20;

        $table = new AdminClickableTable($this);

        $header = new TableHeader($table);
        $header->addEmpty();
        $header->addText('Quelle');
        $header->addText('Source');
        $header->addText('Betreff');
        $header->addText('Nachricht');
        $header->addText('Zuweisung');
        $header->addText('Erledigen bis');
        $header->addText('Ersteller');
        if ($this->showArchive) {
            $header->addText('Archiviert');
        }

        foreach ($assignmentReader->getData() as $assignmentRow) {

            $row = new BootstrapClickableTableRow($table);

            $className = $assignmentRow->contentType->contentTypeClass;

            //$contentType = $assignmentRow->contentType->getContentTypeClassObject();
            //$contentType->dataId = $assignmentRow->dataId;

            //if (class_exists($className)) {


            /** @var AbstractTreeContentType $contentType */
            $contentType = new $className($assignmentRow->dataId);

            if ($assignmentRow->deadline !== null) {
                $trafficLight = new DateTrafficLight($row);
                $trafficLight->date = $assignmentRow->deadline;
            } else {
                $row->addEmpty();
            }

            $row->addText($assignmentRow->contentType->contentType);

            //$row->addText($assignmentRow->subject);
            $source = $assignmentRow->contentType->contentType;
            if ($contentType->isObjectOfClass(AbstractTreeContentType::class)) {

                $parentType = $contentType->getParent();
$parentType = null;

                if ($parentType !== null) {

                    $source = $parentType->getSubject();


                }


            }
            $row->addText($source);


            $row->addText($contentType->getSubject());
            $row->addText($assignmentRow->message);
            $row->addText($assignmentRow->assignment->getValue());

            if ($assignmentRow->deadline !== null) {
                $row->addText($assignmentRow->deadline->getShortDateLeadingZeroFormat());
            } else {
                $row->addEmpty();
            }

            //$contentType = $assignmentRow->contentType->getContentTypeClassObject();

            $row->addText($assignmentRow->userCreated->displayName.' '.$assignmentRow->dateTimeCreated->getShortDateTimeLeadingZeroFormat());

            if ($this->showArchive) {
                $row->addYesNo($assignmentRow->archive);
            }


            if ($contentType !== null) {
                $site = $contentType->getItemSite();

                if ($site !== null) {
                    $row->addClickableSite($site);
                } else {
                    (new LogMessage())->writeError('No Site');
                }
            } else {
                (new LogMessage())->writeError('No Content Type');
            }


            /*     } else {
                     (new LogMessage())->writeError('Class does not exist. Class Name: ' . $className);
                 }

             }*/
        }

        $pagination = new BootstrapModelPagination($this);
        $pagination->paginationReader = $assignmentReader;


        //}

        return parent::getHtml();

    }

}