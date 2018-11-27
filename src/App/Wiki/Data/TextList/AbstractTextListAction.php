<?php

namespace Nemundo\Workflow\App\Wiki\Data\TextList;

use Nemundo\Model\Action\AbstractModelAction;

abstract class AbstractTextListAction extends AbstractModelAction
{
    /**
     * @return TextListRow
     */
    protected function getRow()
    {
        $reader = new TextListReader();
        $reader->connection = $this->connection;
        $row = $reader->getRowById($this->id);
        return $row;
    }
}