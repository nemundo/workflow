<?php

namespace Nemundo\Workflow\App\Search;


use Nemundo\Core\Base\AbstractBase;

class RedefineSearchList extends AbstractBase
{

    /**
     * @var RedefineItem[]
     */
    private $redefineList = [];

    public function addItem(RedefineItem $redefineItem)  // $id, $label, $count = 0
    {

        $this->redefineList[$redefineItem->id] = $redefineItem;
        return $this;

    }


    public function getItemList()
    {
        return $this->redefineList;
    }

}