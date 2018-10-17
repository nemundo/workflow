<?php

namespace Nemundo\Workflow\App\Store\Type;


use Nemundo\Workflow\App\Store\Data\LargeTextStore\LargeTextStore;
use Nemundo\Workflow\App\Store\Data\LargeTextStore\LargeTextStoreCount;
use Nemundo\Workflow\App\Store\Data\LargeTextStore\LargeTextStoreReader;

abstract class AbstractLargeTextStore extends AbstractStore
{

    public function setValue($value)
    {

        $data = new LargeTextStore();
        $data->updateOnDuplicate = true;
        $data->id = $this->storeId;
        $data->text = $value;
        $data->save();

    }


    public function getValue()
    {

        $value = $this->defaultValue;

        $count = new LargeTextStoreCount();
        $count->filter->andEqual($count->model->id, $this->storeId);

        if ($count->getCount() > 0) {
            $row = (new LargeTextStoreReader())->getRowById($this->storeId);
            $value = $row->text;
        }

        return $value;

    }

}