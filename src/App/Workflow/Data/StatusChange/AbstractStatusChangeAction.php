<?php

namespace Nemundo\Workflow\App\Workflow\Data\StatusChange;

use Nemundo\Model\Action\AbstractModelAction;

abstract class AbstractStatusChangeAction extends AbstractModelAction
{
    /**
     * @return StatusChangeRow
     */
    protected function getRow()
    {
        $reader = new StatusChangeReader();
        $reader->connection = $this->connection;
        $row = $reader->getRowById($this->id);
        return $row;
    }
}