<?php

namespace Nemundo\Workflow\App\Wiki\Data\TextList;

use Nemundo\Model\Id\AbstractModelIdValue;

class TextListId extends AbstractModelIdValue
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