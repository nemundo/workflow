<?php
namespace Nemundo\Workflow\App\Stream\Data\StreamGroup;
class StreamGroupDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var StreamGroupModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new StreamGroupModel();
}
}