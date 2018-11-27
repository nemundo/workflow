<?php

namespace Nemundo\Workflow\App\Widget\Data\Widget;
class WidgetCount extends \Nemundo\Model\Count\AbstractModelDataCount
{
    /**
     * @var WidgetModel
     */
    public $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = new WidgetModel();
    }
}