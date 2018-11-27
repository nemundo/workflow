<?php

namespace Nemundo\Workflow\App\Wiki\Data\TextList;
class TextListDelete extends \Nemundo\Model\Delete\AbstractModelDelete
{
    /**
     * @var TextListModel
     */
    public $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = new TextListModel();
    }
}