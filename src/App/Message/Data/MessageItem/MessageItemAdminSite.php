<?php
namespace Nemundo\Workflow\App\Message\Data\MessageItem;
use Nemundo\Model\Site\AbstractModelAdminSite;
class MessageItemAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var MessageItemModel
*/
public $model;

protected function loadSite() {
$this->model = new MessageItemModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}