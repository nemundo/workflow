<?php

namespace Nemundo\Workflow\App\Store\Data\LargeTextStore;

use Nemundo\Model\Data\AbstractModelUpdate;

class LargeTextStoreUpdate extends AbstractModelUpdate
{
    /**
     * @var LargeTextStoreModel
     */
    public $model;

    /**
     * @var string
     */
    public $text;

    public function __construct()
    {
        parent::__construct();
        $this->model = new LargeTextStoreModel();
    }

    public function update()
    {
        $this->typeValueList->setModelValue($this->model->text, $this->text);
        parent::update();
    }
}