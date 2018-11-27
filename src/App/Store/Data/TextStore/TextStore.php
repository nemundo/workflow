<?php

namespace Nemundo\Workflow\App\Store\Data\TextStore;
class TextStore extends \Nemundo\Model\Data\AbstractModelData
{
    /**
     * @var TextStoreModel
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
        $this->model = new TextStoreModel();
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