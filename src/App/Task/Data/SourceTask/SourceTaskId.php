<?php
namespace Nemundo\Workflow\App\Task\Data\SourceTask;
use Nemundo\Model\Id\AbstractModelIdValue;
class SourceTaskId extends AbstractModelIdValue {
/**
* @var SourceTaskModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SourceTaskModel();
}
}