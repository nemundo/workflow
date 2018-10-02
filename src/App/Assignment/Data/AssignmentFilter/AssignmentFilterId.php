<?php
namespace Nemundo\Workflow\App\Assignment\Data\AssignmentFilter;
use Nemundo\Model\Id\AbstractModelIdValue;
class AssignmentFilterId extends AbstractModelIdValue {
/**
* @var AssignmentFilterModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AssignmentFilterModel();
}
}