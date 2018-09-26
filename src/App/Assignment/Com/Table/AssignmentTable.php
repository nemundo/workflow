<?php

namespace Nemundo\Workflow\App\Assignment\Com\Table;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\App\Content\Type\AbstractContentType;
use Nemundo\Com\Container\AbstractHtmlContainerList;
use Nemundo\Com\TableBuilder\TableHeader;
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
     * @var bool
     */
    public $showAssignment = true;

    public $showArchive = false;


    private $userIdList = [];

    public function addUserId($userId)
    {
        $this->userIdList[] = $userId;
        return $this;
    }


    public function getHtml()
    {


        if (sizeof($this->userIdList) > 0) {

            $assignmentReader = new AssignmentPaginationReader();
            $assignmentReader->paginationLimit = 30;

            //$userId = $mitarbeiterListBox->getValue();
            //if ($userId !== '') {

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


            if ($this->showArchive) {


            }


            $assignmentReader->addOrder($assignmentReader->model->id, SortOrder::DESCENDING);

            //$assignmentReader->limit = 20;

            $table = new AdminClickableTable($this);

            $header = new TableHeader($table);
            $header->addEmpty();
            $header->addText('Quelle');
            $header->addText('Betreff');
            $header->addText('Nachricht');
            $header->addText('Zuweisung');
            $header->addText('Erledigen bis');

            foreach ($assignmentReader->getData() as $assignmentRow) {

                $row = new BootstrapClickableTableRow($table);

                $className = $assignmentRow->contentType->contentTypeClass;

                //$contentType = $assignmentRow->contentType->getContentTypeClassObject();
                //$contentType->dataId = $assignmentRow->dataId;

                if (class_exists($className)) {


                    /** @var AbstractContentType $contentType */
                    $contentType = new $className($assignmentRow->dataId);

                    if ($assignmentRow->deadline !== null) {
                        $trafficLight = new DateTrafficLight($row);
                        $trafficLight->date = $assignmentRow->deadline;
                    } else {
                        $row->addEmpty();
                    }

                    $row->addText($assignmentRow->contentType->contentType);

                    //$row->addText($assignmentRow->subject);

                    $row->addText($contentType->getSubject());
                    $row->addText($assignmentRow->message);
                    $row->addText($assignmentRow->assignment->getValue());

                    if ($assignmentRow->deadline !== null) {
                        $row->addText($assignmentRow->deadline->getShortDateLeadingZeroFormat());
                    } else {
                        $row->addEmpty();
                    }

                    //$contentType = $assignmentRow->contentType->getContentTypeClassObject();

                    if ($contentType !== null) {
                        $site = $contentType->getItemSite();

                        if ($site !== null) {
                            $row->addClickableSite($site);
                        }
                    }


                } else {
                    (new LogMessage())->writeError('Class does not exist. Class Name: ' . $className);
                }

            }


            $pagination = new BootstrapModelPagination($this);
            $pagination->paginationReader = $assignmentReader;


        }

        return parent::getHtml();

    }

}