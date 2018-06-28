<?php
namespace Nemundo\Workflow\App\Stream\Data\StreamType;
class StreamTypeDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var StreamTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new StreamTypeModel();
}
}