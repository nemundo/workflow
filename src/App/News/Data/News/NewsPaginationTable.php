<?php

namespace Nemundo\Workflow\App\News\Data\News;
class NewsPaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable
{
    /**
     * @var NewsModel
     */
    public $model;

    protected function loadCom()
    {
        parent::loadCom();
        $this->model = new NewsModel();
    }
}