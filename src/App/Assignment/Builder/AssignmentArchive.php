<?php

namespace Nemundo\Workflow\App\Assignment\Builder;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Workflow\App\Assignment\Data\Assignment\AssignmentDelete;
use Nemundo\Workflow\App\Assignment\Data\Assignment\AssignmentUpdate;

class AssignmentArchive extends AbstractBase
{


    public function archiveAssignment($dataId)
    {

        $update = new AssignmentUpdate();
        $update->filter->andEqual($update->model->dataId, $dataId);
        $update->archive = true;
        $update->update();

    }


    public function deleteAssignment($dataId)
    {

        $delete = new AssignmentDelete();
        $delete->filter->andEqual($delete->model->dataId, $dataId);
        $delete->delete();

    }



}