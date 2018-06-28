<?php
namespace Nemundo\Workflow\App\Stream\Data\StreamType;
class StreamType extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var StreamTypeModel
*/
protected $model;

public function __construct() {
parent::__construct();
$this->model = new StreamTypeModel();
}
public function save() {
$id = parent::save();
return $id;
}
}