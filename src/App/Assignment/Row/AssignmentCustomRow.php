<?php

namespace Nemundo\Workflow\App\Assignment\Row;


use Nemundo\App\Content\Type\AbstractTreeContentType;
use Nemundo\Workflow\App\Assignment\Data\Assignment\AssignmentRow;

class AssignmentCustomRow extends AssignmentRow
{

    public function getContentType() {

        $className = $this->contentType->contentTypeClass;

        /** @var AbstractTreeContentType $contentType */
        $contentType = new $className($this->dataId);

        return $contentType;

    }

}