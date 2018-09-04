<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\SendInbox;
use Nemundo\Model\Site\AbstractModelAdminSite;
class SendInboxAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var SendInboxModel
*/
public $model;

protected function loadSite() {
$this->model = new SendInboxModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}