<?php
namespace Nemundo\Workflow\App\Message\Data\MessageText;
use Nemundo\Model\Site\AbstractModelAdminSite;
class MessageTextAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var MessageTextModel
*/
public $model;

protected function loadSite() {
$this->model = new MessageTextModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}