<?php
namespace Nemundo\Workflow\App\Workflow\Data\Process;
use Nemundo\Model\Id\AbstractModelIdValue;
class ProcessId extends AbstractModelIdValue {
/**
* @var ProcessModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ProcessModel();
}
}