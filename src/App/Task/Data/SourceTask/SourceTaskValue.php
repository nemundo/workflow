<?php
namespace Nemundo\Workflow\App\Task\Data\SourceTask;
class SourceTaskValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var SourceTaskModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SourceTaskModel();
}
}