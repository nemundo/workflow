<?php

namespace Nemundo\Workflow\App\Message\Data\MessageTo;

use Nemundo\Model\Action\AbstractModelAction;

abstract class AbstractMessageToAction extends AbstractModelAction
{
    /**
     * @return MessageToRow
     */
    protected function getRow()
    {
        $reader = new MessageToReader();
        $reader->connection = $this->connection;
        $row = $reader->getRowById($this->id);
        return $row;
    }
}