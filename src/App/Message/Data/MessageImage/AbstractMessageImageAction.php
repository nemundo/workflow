<?php

namespace Nemundo\Workflow\App\Message\Data\MessageImage;

use Nemundo\Model\Action\AbstractModelAction;

abstract class AbstractMessageImageAction extends AbstractModelAction
{
    /**
     * @return MessageImageRow
     */
    protected function getRow()
    {
        $reader = new MessageImageReader();
        $reader->connection = $this->connection;
        $row = $reader->getRowById($this->id);
        return $row;
    }
}