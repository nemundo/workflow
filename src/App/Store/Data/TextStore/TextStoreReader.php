<?php

namespace Nemundo\Workflow\App\Store\Data\TextStore;
class TextStoreReader extends \Nemundo\Model\Reader\ModelDataReader
{
    /**
     * @var TextStoreModel
     */
    public $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = new TextStoreModel();
    }

    /**
     * @return TextStoreRow[]
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
     * @return TextStoreRow
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
     * @return TextStoreRow
     */
    public function getRowById($id)
    {
        return parent::getRowById($id);
    }

    private function getModelRow($dataRow)
    {
        $row = new TextStoreRow($dataRow, $this->model);
        $row->model = $this->model;
        return $row;
    }
}