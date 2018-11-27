<?php

namespace Nemundo\Workflow\App\ToDo\Data\ToDo;
class ToDoPaginationReader extends \Nemundo\Model\Reader\AbstractModelPaginationDataReader
{
    /**
     * @var ToDoModel
     */
    public $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = new ToDoModel();
    }

    /**
     * @return ToDoRow[]
     */
    public function getData()
    {
        $list = [];
        foreach (parent::getData() as $dataRow) {
            $row = new ToDoRow($dataRow, $this->model);
            $list[] = $row;
        }
        return $list;
    }
}