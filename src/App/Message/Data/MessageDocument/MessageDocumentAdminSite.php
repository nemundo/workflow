<?php
namespace Nemundo\Workflow\App\Message\Data\MessageDocument;
use Nemundo\Model\Site\AbstractModelAdminSite;
class MessageDocumentAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var MessageDocumentModel
*/
public $model;

protected function loadSite() {
$this->model = new MessageDocumentModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}