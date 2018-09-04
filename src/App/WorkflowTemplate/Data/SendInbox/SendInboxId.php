<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\SendInbox;
use Nemundo\Model\Id\AbstractModelIdValue;
class SendInboxId extends AbstractModelIdValue {
/**
* @var SendInboxModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SendInboxModel();
}
}