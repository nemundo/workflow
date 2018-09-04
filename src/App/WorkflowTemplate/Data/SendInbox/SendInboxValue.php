<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\SendInbox;
class SendInboxValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var SendInboxModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SendInboxModel();
}
}