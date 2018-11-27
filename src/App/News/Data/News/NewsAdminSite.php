<?php

namespace Nemundo\Workflow\App\News\Data\News;

class NewsAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite
{
    /**
     * @var NewsModel
     */
    public $model;

    protected function loadSite()
    {
        $this->model = new NewsModel();
        $this->title = $this->model->label;
        $this->url = $this->model->tableName;
    }
}