<?php

namespace Nemundo\Workflow\App\Assignment\Data\AssignmentFilter;
class AssignmentFilterCount extends \Nemundo\Model\Count\AbstractModelDataCount
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