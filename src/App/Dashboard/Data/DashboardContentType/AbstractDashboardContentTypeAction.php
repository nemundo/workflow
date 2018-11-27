<?php

namespace Nemundo\Workflow\App\Dashboard\Data\DashboardContentType;

use Nemundo\Model\Action\AbstractModelAction;

abstract class AbstractDashboardContentTypeAction extends AbstractModelAction
{
    /**
     * @return DashboardContentTypeRow
     */
    protected function getRow()
    {
        $reader = new DashboardContentTypeReader();
        $reader->connection = $this->connection;
        $row = $reader->getRowById($this->id);
        return $row;
    }
}