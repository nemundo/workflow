<?php

namespace Nemundo\Workflow\App\Message\Data\MessageText;

use Nemundo\Model\Action\AbstractModelAction;

abstract class AbstractMessageTextAction extends AbstractModelAction
{
    /**
     * @return MessageTextRow
     */
    protected function getRow()
    {
        $reader = new MessageTextReader();
        $reader->connection = $this->connection;
        $row = $reader->getRowById($this->id);
        return $row;
    }
}