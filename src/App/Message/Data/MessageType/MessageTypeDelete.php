<?php
namespace Nemundo\Workflow\App\Message\Data\MessageType;
class MessageTypeDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var MessageTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new MessageTypeModel();
}
}