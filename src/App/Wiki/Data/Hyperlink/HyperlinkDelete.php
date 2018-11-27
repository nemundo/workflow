<?php

namespace Nemundo\Workflow\App\Wiki\Data\Hyperlink;
class HyperlinkDelete extends \Nemundo\Model\Delete\AbstractModelDelete
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