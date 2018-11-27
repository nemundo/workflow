<?php

namespace Nemundo\Workflow\App\Store\Data\LargeTextStore;
class LargeTextStore extends \Nemundo\Model\Data\AbstractModelData
{
    /**
     * @var LargeTextStoreModel
     */
    protected $model;

    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $text;

    public function __construct()
    {
        parent::__construct();
        $this->model = new LargeTextStoreModel();
    }

    public function save()
    {
        $id = $this->id;
        $this->typeValueList->setModelValue($this->model->id, $id);
        $this->typeValueList->setModelValue($this->model->text, $this->text);
        $id = parent::save();
        return $id;
    }
}