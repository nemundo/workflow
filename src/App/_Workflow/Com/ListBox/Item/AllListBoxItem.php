<?php

namespace Nemundo\Workflow\App\Workflow\Com\ListBox\Item;


use Nemundo\Core\Base\AbstractDataType;

class AllListBoxItem extends AbstractDataType
{

    protected function loadData()
    {
        $this->name = 'Alle';
        $this->id = 0;
    }

}