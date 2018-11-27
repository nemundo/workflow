<?php

namespace Nemundo\Workflow\App\Wiki\Data\WikiContent;
class WikiContentReader extends \Nemundo\Model\Reader\ModelDataReader
{
    /**
     * @var WikiContentModel
     */
    public $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = new WikiContentModel();
    }

    /**
     * @return WikiContentRow[]
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
     * @return WikiContentRow
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
     * @return WikiContentRow
     */
    public function getRowById($id)
    {
        return parent::getRowById($id);
    }

    private function getModelRow($dataRow)
    {
        $row = new WikiContentRow($dataRow, $this->model);
        $row->model = $this->model;
        return $row;
    }
}