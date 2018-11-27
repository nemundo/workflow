<?php

namespace Nemundo\Workflow\App\Store\Data\TextStore;
class TextStoreCount extends \Nemundo\Model\Count\AbstractModelDataCount
{
    /**
     * @var TextStoreModel
     */
    public $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = new TextStoreModel();
    }
}