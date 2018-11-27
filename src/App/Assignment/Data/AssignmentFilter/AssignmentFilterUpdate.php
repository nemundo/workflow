<?php

namespace Nemundo\Workflow\App\Assignment\Data\AssignmentFilter;

use Nemundo\Model\Data\AbstractModelUpdate;

class AssignmentFilterUpdate extends AbstractModelUpdate
{
    /**
     * @var AssignmentFilterModel
     */
    public $model;

    /**
     * @var string
     */
    public $contentTypeId;

    public function __construct()
    {
        parent::__construct();
        $this->model = new AssignmentFilterModel();
    }

    public function update()
    {
        $this->typeValueList->setModelValue($this->model->contentTypeId, $this->contentTypeId);
        parent::update();
    }
}