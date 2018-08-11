<?php
namespace Nemundo\Workflow\App\PersonalTask\Data\PersonalTask;
class PersonalTaskValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var PersonalTaskModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PersonalTaskModel();
}
}