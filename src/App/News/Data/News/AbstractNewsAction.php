<?php

namespace Nemundo\Workflow\App\News\Data\News;

use Nemundo\Model\Action\AbstractModelAction;

abstract class AbstractNewsAction extends AbstractModelAction
{
    /**
     * @return NewsRow
     */
    protected function getRow()
    {
        $reader = new NewsReader();
        $reader->connection = $this->connection;
        $row = $reader->getRowById($this->id);
        return $row;
    }
}