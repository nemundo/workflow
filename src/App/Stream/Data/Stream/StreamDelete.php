<?php
namespace Nemundo\Workflow\App\Stream\Data\Stream;
class StreamDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var StreamModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new StreamModel();
}
}