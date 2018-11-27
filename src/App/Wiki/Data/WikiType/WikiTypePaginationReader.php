<?php

namespace Nemundo\Workflow\App\Wiki\Data\WikiType;
class WikiTypePaginationReader extends \Nemundo\Model\Reader\AbstractModelPaginationDataReader
{
    /**
     * @var WikiTypeModel
     */
    public $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = new WikiTypeModel();
    }

    /**
     * @return WikiTypeRow[]
     */
    public function getData()
    {
        $list = [];
        foreach (parent::getData() as $dataRow) {
            $row = new WikiTypeRow($dataRow, $this->model);
            $list[] = $row;
        }
        return $list;
    }
}