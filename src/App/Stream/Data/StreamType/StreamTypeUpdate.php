<?php
namespace Nemundo\Workflow\App\Stream\Data\StreamType;
use Nemundo\Model\Data\AbstractModelUpdate;
class StreamTypeUpdate extends AbstractModelUpdate {
/**
* @var StreamTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new StreamTypeModel();
}
public function update() {
parent::update();
}
}