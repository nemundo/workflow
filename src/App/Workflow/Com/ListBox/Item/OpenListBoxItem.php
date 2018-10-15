<?php

namespace Nemundo\Workflow\App\Workflow\Com\ListBox\Item;


use Nemundo\Core\Base\AbstractDataType;

class OpenListBoxItem extends AbstractDataType
{

    protected function loadData()
    {
        $this->name = 'Offen';
        $this->id = 1;
    }

}