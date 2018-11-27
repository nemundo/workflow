<?php

namespace Nemundo\Workflow\App\Wiki\Data\Hyperlink;

use Nemundo\Model\Action\AbstractModelAction;

abstract class AbstractHyperlinkAction extends AbstractModelAction
{
    /**
     * @return HyperlinkRow
     */
    protected function getRow()
    {
        $reader = new HyperlinkReader();
        $reader->connection = $this->connection;
        $row = $reader->getRowById($this->id);
        return $row;
    }
}