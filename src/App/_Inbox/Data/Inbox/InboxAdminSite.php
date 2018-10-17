<?php
namespace Nemundo\Workflow\App\Inbox\Data\Inbox;
use Nemundo\Model\Site\AbstractModelAdminSite;
class InboxAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var InboxModel
*/
public $model;

protected function loadSite() {
$this->model = new InboxModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}