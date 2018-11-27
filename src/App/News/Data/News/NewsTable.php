<?php

namespace Nemundo\Workflow\App\News\Data\News;

use Nemundo\Package\Bootstrap\Table\BootstrapModelTable;

class NewsTable extends BootstrapModelTable
{
    /**
     * @var NewsModel
     */
    public $model;

    protected function loadCom()
    {
        $this->model = new NewsModel();
    }
}