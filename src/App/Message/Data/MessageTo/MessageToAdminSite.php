<?php
namespace Nemundo\Workflow\App\Message\Data\MessageTo;
use Nemundo\Model\Site\AbstractModelAdminSite;
class MessageToAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var MessageToModel
*/
public $model;

protected function loadSite() {
$this->model = new MessageToModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}