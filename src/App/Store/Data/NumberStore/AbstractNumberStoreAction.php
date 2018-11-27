<?php

namespace Nemundo\Workflow\App\Store\Data\NumberStore;

use Nemundo\Model\Action\AbstractModelAction;

abstract class AbstractNumberStoreAction extends AbstractModelAction
{
    /**
     * @return NumberStoreRow
     */
    protected function getRow()
    {
        $reader = new NumberStoreReader();
        $reader->connection = $this->connection;
        $row = $reader->getRowById($this->id);
        return $row;
    }
}