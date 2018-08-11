<?php
namespace Nemundo\Workflow\App\PersonalTask\Data\PersonalTask;
class PersonalTaskCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var PersonalTaskModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PersonalTaskModel();
}
}