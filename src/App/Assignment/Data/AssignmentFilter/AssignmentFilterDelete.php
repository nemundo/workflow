<?php

namespace Nemundo\Workflow\App\Assignment\Data\AssignmentFilter;
class AssignmentFilterDelete extends \Nemundo\Model\Delete\AbstractModelDelete
{
    /**
     * @var AssignmentFilterModel
     */
    public $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = new AssignmentFilterModel();
    }
}