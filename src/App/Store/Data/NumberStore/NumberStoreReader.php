<?php

namespace Nemundo\Workflow\App\Store\Data\NumberStore;
class NumberStoreReader extends \Nemundo\Model\Reader\ModelDataReader
{
    /**
     * @var NumberStoreModel
     */
    public $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = new NumberStoreModel();
    }

    /**
     * @return NumberStoreRow[]
     */
    public function getData()
    {
        $this->addFieldByModel($this->model);
        $this->checkExternal($this->model);
        $list = [];
        foreach (parent::getData() as $dataRow) {
            $row = $this->getModelRow($dataRow);
            $list[] = $row;
        }
        return $list;
    }

    /**
     * @return NumberStoreRow
     */
    public function getRow()
    {
        $this->addFieldByModel($this->model);
        $this->checkExternal($this->model);
        $dataRow = parent::getRow();
        $row = $this->getModelRow($dataRow);
        return $row;
    }

    /**
     * @return NumberStoreRow
     */
    public function getRowById($id)
    {
        return parent::getRowById($id);
    }

    private function getModelRow($dataRow)
    {
        $row = new NumberStoreRow($dataRow, $this->model);
        $row->model = $this->model;
        return $row;
    }
}