<?php

namespace Nemundo\Workflow\App\Wiki\Data\WikiPage;

use Nemundo\Model\Data\AbstractModelUpdate;

class WikiPageUpdate extends AbstractModelUpdate
{
    /**
     * @var WikiPageModel
     */
    public $model;

    /**
     * @var string
     */
    public $title;

    /**
     * @var int
     */
    public $count;

    /**
     * @var string
     */
    public $url;

    public function __construct()
    {
        parent::__construct();
        $this->model = new WikiPageModel();
    }

    public function update()
    {
        $this->typeValueList->setModelValue($this->model->title, $this->title);
        $this->typeValueList->setModelValue($this->model->count, $this->count);
        $this->typeValueList->setModelValue($this->model->url, $this->url);
        parent::update();
    }
}