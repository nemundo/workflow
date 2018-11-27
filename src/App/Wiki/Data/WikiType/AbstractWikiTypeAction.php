<?php

namespace Nemundo\Workflow\App\Wiki\Data\WikiType;

use Nemundo\Model\Action\AbstractModelAction;

abstract class AbstractWikiTypeAction extends AbstractModelAction
{
    /**
     * @return WikiTypeRow
     */
    protected function getRow()
    {
        $reader = new WikiTypeReader();
        $reader->connection = $this->connection;
        $row = $reader->getRowById($this->id);
        return $row;
    }
}