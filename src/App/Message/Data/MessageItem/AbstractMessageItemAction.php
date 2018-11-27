<?php

namespace Nemundo\Workflow\App\Message\Data\MessageItem;

use Nemundo\Model\Action\AbstractModelAction;

abstract class AbstractMessageItemAction extends AbstractModelAction
{
    /**
     * @return MessageItemRow
     */
    protected function getRow()
    {
        $reader = new MessageItemReader();
        $reader->connection = $this->connection;
        $row = $reader->getRowById($this->id);
        return $row;
    }
}