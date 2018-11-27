<?php

namespace Nemundo\Workflow\App\Assignment\Data\Assignment;

use Nemundo\Model\Action\AbstractModelAction;

abstract class AbstractAssignmentAction extends AbstractModelAction
{
    /**
     * @return AssignmentRow
     */
    protected function getRow()
    {
        $reader = new AssignmentReader();
        $reader->connection = $this->connection;
        $row = $reader->getRowById($this->id);
        return $row;
    }
}