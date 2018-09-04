<?php

namespace Nemundo\Workflow\App\Assignment\Builder;


use Nemundo\Core\Base\AbstractBase;
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


}