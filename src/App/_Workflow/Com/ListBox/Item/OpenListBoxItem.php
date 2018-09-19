<?php

namespace Nemundo\Workflow\App\Workflow\Com\ListBox\Item;


use Nemundo\Core\Base\AbstractDataType;

class OpenListBoxItem extends AbstractDataType
{

    protected function loadData()
    {
        $this->name = 'Offene';
        $this->id = 1;
    }

}