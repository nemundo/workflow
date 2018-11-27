<?php

namespace Nemundo\Workflow\App\Message\Data\MessageType;

use Nemundo\Model\Action\AbstractModelAction;

abstract class AbstractMessageTypeAction extends AbstractModelAction
{
    /**
     * @return MessageTypeRow
     */
    protected function getRow()
    {
        $reader = new MessageTypeReader();
        $reader->connection = $this->connection;
        $row = $reader->getRowById($this->id);
        return $row;
    }
}