<?php
namespace Nemundo\Workflow\App\PersonalTask\Data\PersonalTask;
class PersonalTaskDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var PersonalTaskModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PersonalTaskModel();
}
}