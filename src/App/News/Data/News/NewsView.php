<?php

namespace Nemundo\Workflow\App\News\Data\News;

use Nemundo\Model\View\ModelView;

class NewsView extends ModelView
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