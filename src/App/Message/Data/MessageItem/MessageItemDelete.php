<?php
namespace Nemundo\Workflow\App\Message\Data\MessageItem;
class MessageItemDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var MessageItemModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new MessageItemModel();
}
}