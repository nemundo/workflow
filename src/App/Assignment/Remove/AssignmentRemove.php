<?php

namespace Nemundo\Workflow\App\Assignment\Remove;


use Nemundo\App\Content\Type\AbstractContentType;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Workflow\App\Assignment\Data\Assignment\AssignmentDelete;

class AssignmentRemove extends AbstractBase
{

    public function removeAllAssignment(AbstractContentType $contentType) {

        $delete = new AssignmentDelete();
        $delete->filter->andEqual($delete->model->contentTypeId, $contentType->contentId);
        $delete->delete();

    }

}