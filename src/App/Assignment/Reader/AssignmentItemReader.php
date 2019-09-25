<?php

namespace Nemundo\Workflow\App\Assignment\Reader;


use Nemundo\App\Content\Type\AbstractTreeContentType;
use Nemundo\Core\Base\DataSource\AbstractDataSource;
use Nemundo\Db\Filter\Filter;
use Nemundo\User\Type\UserSessionType;
use Nemundo\Workflow\App\Assignment\Data\Assignment\AssignmentPaginationModelReader;
use Nemundo\Workflow\App\Identification\Config\IdentificationConfig;


// AssignmentContentTypeReader
class AssignmentItemReader extends AbstractDataSource
{


    /**
     * @return AssignmentItem[]
     */
    public function getData()
    {
        return parent::getData();
    }

    protected function loadData()
    {


        $userId = (new UserSessionType())->userId;

        $assignmentReader = new AssignmentPaginationModelReader();


        $filter = new Filter();


        //foreach ($this->userIdList as $userId) {

        foreach ((new IdentificationConfig())->getIdentificationList() as $identification) {

            foreach ($identification->getIdentificationIdFromUserId($userId) as $value) {
                $filter->orEqual($assignmentReader->model->assignment->identificationId, $value);
            }

        }

        //}


        $assignmentReader->filter->andFilter($filter);
        $assignmentReader->filter->andEqual($assignmentReader->model->archive, false);


        foreach ($assignmentReader->getData() as $assignmentRow) {

            $item = new AssignmentItem();
            //$item->subject = $assignmentRow->subject;

            $className = $assignmentRow->contentType->contentTypeClass;

            /** @var AbstractTreeContentType $contentType */
            $contentType = new $className($assignmentRow->dataId);

            $item->subject = $contentType->getSubject();
            $item->site = $contentType->getViewSite();

            $item->deadline = $assignmentRow->deadline;
            $item->creator = $assignmentRow->userCreated->displayName . ' ' . $assignmentRow->dateTimeCreated->getShortDateLeadingZeroFormat();

            $this->addItem($item);


        }


    }


}