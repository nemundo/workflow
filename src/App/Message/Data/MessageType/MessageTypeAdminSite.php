<?php
namespace Nemundo\Workflow\App\Message\Data\MessageType;
use Nemundo\Model\Site\AbstractModelAdminSite;
class MessageTypeAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var MessageTypeModel
*/
public $model;

protected function loadSite() {
$this->model = new MessageTypeModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}