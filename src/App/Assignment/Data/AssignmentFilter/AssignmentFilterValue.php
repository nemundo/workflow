<?php
namespace Nemundo\Workflow\App\Assignment\Data\AssignmentFilter;
class AssignmentFilterValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var AssignmentFilterModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AssignmentFilterModel();
}
}