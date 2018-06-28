<?php
namespace Nemundo\Workflow\App\Stream\Data\StreamType;
class StreamTypeCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var StreamTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new StreamTypeModel();
}
}