<?php
namespace Nemundo\Workflow\App\Stream\Data\StreamGroup;
class StreamGroup extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var StreamGroupModel
*/
protected $model;

/**
* @var string
*/
public $group;

public function __construct() {
parent::__construct();
$this->model = new StreamGroupModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->group, $this->group);
$id = parent::save();
return $id;
}
}