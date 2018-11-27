<?php

namespace Nemundo\Workflow\App\Wiki\Data\WikiPage;
class WikiPagePaginationReader extends \Nemundo\Model\Reader\AbstractModelPaginationDataReader
{
    /**
     * @var WikiPageModel
     */
    public $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = new WikiPageModel();
    }

    /**
     * @return WikiPageRow[]
     */
    public function getData()
    {
        $list = [];
        foreach (parent::getData() as $dataRow) {
            $row = new WikiPageRow($dataRow, $this->model);
            $list[] = $row;
        }
        return $list;
    }
}