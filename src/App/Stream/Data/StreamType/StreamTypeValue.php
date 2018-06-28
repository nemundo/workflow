<?php
namespace Nemundo\Workflow\App\Stream\Data\StreamType;
class StreamTypeValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var StreamTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new StreamTypeModel();
}
}