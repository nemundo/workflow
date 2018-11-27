<?php

namespace Nemundo\Workflow\App\Wiki\Data\TextList;

use Nemundo\Model\Data\AbstractModelUpdate;

class TextListUpdate extends AbstractModelUpdate
{
    /**
     * @var TextListModel
     */
    public $model;

    /**
     * @var string
     */
    public $dataId;

    /**
     * @var string
     */
    public $text;

    public function __construct()
    {
        parent::__construct();
        $this->model = new TextListModel();
    }

    public function update()
    {
        $this->typeValueList->setModelValue($this->model->dataId, $this->dataId);
        $this->typeValueList->setModelValue($this->model->text, $this->text);
        parent::update();
    }
}