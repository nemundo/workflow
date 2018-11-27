<?php

namespace Nemundo\Workflow\App\Wiki\Data\TitleChange;
class TitleChange extends \Nemundo\Model\Data\AbstractModelData
{
    /**
     * @var TitleChangeModel
     */
    protected $model;

    /**
     * @var string
     */
    public $title;

    public function __construct()
    {
        parent::__construct();
        $this->model = new TitleChangeModel();
    }

    public function save()
    {
        $this->typeValueList->setModelValue($this->model->title, $this->title);
        $id = parent::save();
        return $id;
    }
}