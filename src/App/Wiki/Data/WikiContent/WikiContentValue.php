<?php

namespace Nemundo\Workflow\App\Wiki\Data\WikiContent;
class WikiContentValue extends \Nemundo\Model\Value\AbstractModelDataValue
{
    /**
     * @var WikiContentModel
     */
    public $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = new WikiContentModel();
    }
}