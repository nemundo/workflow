<?php
namespace Nemundo\Workflow\App\Message\Data\Message;
use Nemundo\Model\Site\AbstractModelAdminSite;
class MessageAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var MessageModel
*/
public $model;

protected function loadSite() {
$this->model = new MessageModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}