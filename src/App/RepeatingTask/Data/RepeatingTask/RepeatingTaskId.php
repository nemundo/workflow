<?php
namespace Nemundo\Workflow\App\RepeatingTask\Data\RepeatingTask;
use Nemundo\Model\Id\AbstractModelIdValue;
class RepeatingTaskId extends AbstractModelIdValue {
/**
* @var RepeatingTaskModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new RepeatingTaskModel();
}
}