<?php

namespace Nemundo\Workflow\App\Store\Type;


use Nemundo\Workflow\App\Store\Data\LargeTextStore\LargeTextStore;
use Nemundo\Workflow\App\Store\Data\LargeTextStore\LargeTextStoreCount;
use Nemundo\Workflow\App\Store\Data\LargeTextStore\LargeTextStoreDelete;
use Nemundo\Workflow\App\Store\Data\LargeTextStore\LargeTextStoreReader;
use Nemundo\Workflow\App\Store\Data\YesNoStore\YesNoStore;
use Nemundo\Workflow\App\Store\Data\YesNoStore\YesNoStoreReader;

abstract class AbstractYesNoStoreType extends AbstractStoreType
{

    /**
     * @var bool
     */
    protected $defaultValue = false;

    public function setValue($value)
    {


        $data = new YesNoStore();
        $data->updateOnDuplicate = true;
        $data->id = $this->storeId;
        $data->value = $value;
        $data->save();

    }


    public function getValue()
    {

        $value = $this->defaultValue;


        $storeReader = new YesNoStoreReader();
        $storeReader->filter->andEqual($storeReader->model->id, $this->storeId);
        foreach ($storeReader->getData() as $storeRow) {
            $value = $storeRow->value;
        }


        /*
        $count = new LargeTextStoreCount();
        $count->filter->andEqual($count->model->id, $this->storeId);

        if ($count->getCount() > 0) {
            $row = (new LargeTextStoreReader())->getRowById($this->storeId);
            $value = $row->text;
        }*/

        return $value;

    }


    public function removeStore()
    {

        (new LargeTextStoreDelete())->deleteById($this->storeId);

        return $this;

    }

}