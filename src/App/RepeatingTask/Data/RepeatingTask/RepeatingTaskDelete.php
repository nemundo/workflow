<?php
namespace Nemundo\Workflow\App\RepeatingTask\Data\RepeatingTask;
class RepeatingTaskDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var RepeatingTaskModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new RepeatingTaskModel();
}
}