<?php

namespace Nemundo\Workflow\App\Workflow\Data\StatusChange;

use Nemundo\Model\Id\AbstractModelIdValue;

class StatusChangeId extends AbstractModelIdValue
{
    /**
     * @var StatusChangeModel
     */
    public $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = new StatusChangeModel();
    }
}