<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\SendInbox;
class SendInboxCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var SendInboxModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SendInboxModel();
}
}