<?php
namespace Nemundo\Workflow\App\Stream\Data\StreamGroup;
use Nemundo\Model\Data\AbstractModelUpdate;
class StreamGroupUpdate extends AbstractModelUpdate {
/**
* @var StreamGroupModel
*/
public $model;

/**
* @var string
*/
public $group;

public function __construct() {
parent::__construct();
$this->model = new StreamGroupModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->group, $this->group);
parent::update();
}
}