<?php
namespace Nemundo\Workflow\App\Task\Data\SourceTask;
class SourceTaskDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var SourceTaskModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SourceTaskModel();
}
}