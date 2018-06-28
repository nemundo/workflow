<?php
namespace Nemundo\Workflow\App\Stream\Data\StreamGroup;
class StreamGroupValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var StreamGroupModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new StreamGroupModel();
}
}