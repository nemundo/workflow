<?php

namespace Nemundo\Workflow\App\Store\Type;


use Nemundo\Workflow\App\Store\Data\TextStore\TextStore;
use Nemundo\Workflow\App\Store\Data\TextStore\TextStoreCount;
use Nemundo\Workflow\App\Store\Data\TextStore\TextStoreDelete;
use Nemundo\Workflow\App\Store\Data\TextStore\TextStoreReader;

abstract class AbstractTextStoreType extends AbstractStoreType
{

    public function setValue($value)
    {

        $data = new TextStore();
        $data->updateOnDuplicate = true;
        $data->id = $this->storeId;
        $data->text = $value;
        $data->save();

    }


    public function getValue()
    {

        $value = $this->defaultValue;

        $count = new TextStoreCount();
        $count->filter->andEqual($count->model->id, $this->storeId);

        if ($count->getCount() > 0) {
            $row = (new TextStoreReader())->getRowById($this->storeId);
            $value = $row->text;
        }

        return $value;

    }


    public function removeStore()
    {

        (new TextStoreDelete())->deleteById($this->storeId);

        return $this;

    }

}