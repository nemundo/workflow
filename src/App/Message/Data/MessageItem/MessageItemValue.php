<?php
namespace Nemundo\Workflow\App\Message\Data\MessageItem;
class MessageItemValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var MessageItemModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new MessageItemModel();
}
}