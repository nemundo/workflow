<?php

namespace Nemundo\Workflow\App\Dashboard\Data\DashboardContentType;
class DashboardContentType extends \Nemundo\Model\Data\AbstractModelData
{
    /**
     * @var DashboardContentTypeModel
     */
    protected $model;

    /**
     * @var string
     */
    public $contentTypeId;

    public function __construct()
    {
        parent::__construct();
        $this->model = new DashboardContentTypeModel();
    }

    public function save()
    {
        $this->typeValueList->setModelValue($this->model->contentTypeId, $this->contentTypeId);
        $id = parent::save();
        return $id;
    }
}