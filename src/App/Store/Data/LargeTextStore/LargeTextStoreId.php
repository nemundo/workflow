<?php

namespace Nemundo\Workflow\App\Store\Data\LargeTextStore;

use Nemundo\Model\Id\AbstractModelIdValue;

class LargeTextStoreId extends AbstractModelIdValue
{
    /**
     * @var LargeTextStoreModel
     */
    public $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = new LargeTextStoreModel();
    }
}