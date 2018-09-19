<?php

namespace Nemundo\Workflow\App\Workflow\Com\ListBox\Item;


use Nemundo\Core\Base\AbstractDataType;

class ClosedListBoxItem extends AbstractDataType
{

    protected function loadData()
    {
        $this->name = 'Abgeschlossen';
        $this->id = 2;
    }

}