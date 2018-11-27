<?php

namespace Nemundo\Workflow\App\News\Data\News;
class NewsCount extends \Nemundo\Model\Count\AbstractModelDataCount
{
    /**
     * @var NewsModel
     */
    public $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = new NewsModel();
    }
}