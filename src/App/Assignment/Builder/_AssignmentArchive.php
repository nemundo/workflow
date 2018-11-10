<?php

namespace Nemundo\Workflow\App\Assignment\Builder;


use Nemundo\App\Content\Type\AbstractContentType;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Workflow\App\Assignment\Data\Assignment\AssignmentDelete;
use Nemundo\Workflow\App\Assignment\Data\Assignment\AssignmentUpdate;

class AssignmentArchive extends AbstractBase
{


    public function __construct(AbstractContentType $contentType = null)
    {
        $this->contentType = $contentType;
    }


    /**
     * @var AbstractContentType
     */
    public $contentType;


    // nach AssignmentBuilder
    // ContentType/DataId

    public function archiveAssignment($dataId)
    {

        $update = new AssignmentUpdate();
        $update->filter->andEqual($update->model->dataId, $dataId);
        $update->archive = true;
        $update->update();

    }


    // removeAssignment()
   /* public function deleteAssignment()
    {

        $delete = new AssignmentDelete();
        $delete->filter->andEqual($delete->model->contentTypeId, $this->contentType->contentId);
        $delete->filter->andEqual($delete->model->dataId, $this->contentType->dataId);
        $delete->delete();

    }*/



}