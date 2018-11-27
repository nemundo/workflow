<?php

namespace Nemundo\Workflow\App\Dashboard\Data\DashboardContentType;
class DashboardContentTypePaginationReader extends \Nemundo\Model\Reader\AbstractModelPaginationDataReader
{
    /**
     * @var DashboardContentTypeModel
     */
    public $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = new DashboardContentTypeModel();
    }

    /**
     * @return DashboardContentTypeRow[]
     */
    public function getData()
    {
        $list = [];
        foreach (parent::getData() as $dataRow) {
            $row = new DashboardContentTypeRow($dataRow, $this->model);
            $list[] = $row;
        }
        return $list;
    }
}