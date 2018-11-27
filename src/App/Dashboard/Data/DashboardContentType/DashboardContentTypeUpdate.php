<?php

namespace Nemundo\Workflow\App\Dashboard\Data\DashboardContentType;

use Nemundo\Model\Data\AbstractModelUpdate;

class DashboardContentTypeUpdate extends AbstractModelUpdate
{
    /**
     * @var DashboardContentTypeModel
     */
    public $model;

    /**
     * @var string
     */
    public $contentTypeId;

    public function __construct()
    {
        parent::__construct();
        $this->model = new DashboardContentTypeModel();
    }

    public function update()
    {
        $this->typeValueList->setModelValue($this->model->contentTypeId, $this->contentTypeId);
        parent::update();
    }
}