<?php
namespace Nemundo\Workflow\App\RepeatingTask\Data\RepeatingTask;
class RepeatingTaskValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var RepeatingTaskModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new RepeatingTaskModel();
}
}