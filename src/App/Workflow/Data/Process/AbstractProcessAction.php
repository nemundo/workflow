<?php

namespace Nemundo\Workflow\App\Workflow\Data\Process;

use Nemundo\Model\Action\AbstractModelAction;

abstract class AbstractProcessAction extends AbstractModelAction
{
    /**
     * @return ProcessRow
     */
    protected function getRow()
    {
        $reader = new ProcessReader();
        $reader->connection = $this->connection;
        $row = $reader->getRowById($this->id);
        return $row;
    }
}