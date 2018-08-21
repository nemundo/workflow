<?php
namespace Nemundo\Workflow\App\RepeatingTask\Data\RepeatingTask;
class RepeatingTaskCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var RepeatingTaskModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new RepeatingTaskModel();
}
}