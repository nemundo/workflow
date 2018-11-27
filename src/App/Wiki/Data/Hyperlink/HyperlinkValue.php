<?php

namespace Nemundo\Workflow\App\Wiki\Data\Hyperlink;
class HyperlinkValue extends \Nemundo\Model\Value\AbstractModelDataValue
{
    /**
     * @var HyperlinkModel
     */
    public $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = new HyperlinkModel();
    }
}