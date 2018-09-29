<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\SendInbox;
class SendInboxDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var SendInboxModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SendInboxModel();
}
}