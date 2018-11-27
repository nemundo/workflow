<?php

namespace Nemundo\Workflow\App\Wiki\Data\TitleChange;
class TitleChangeReader extends \Nemundo\Model\Reader\ModelDataReader
{
    /**
     * @var TitleChangeModel
     */
    public $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = new TitleChangeModel();
    }

    /**
     * @return TitleChangeRow[]
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
     * @return TitleChangeRow
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
     * @return TitleChangeRow
     */
    public function getRowById($id)
    {
        return parent::getRowById($id);
    }

    private function getModelRow($dataRow)
    {
        $row = new TitleChangeRow($dataRow, $this->model);
        $row->model = $this->model;
        return $row;
    }
}