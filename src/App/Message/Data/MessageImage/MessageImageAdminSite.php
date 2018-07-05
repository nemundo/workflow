<?php
namespace Nemundo\Workflow\App\Message\Data\MessageImage;
use Nemundo\Model\Site\AbstractModelAdminSite;
class MessageImageAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var MessageImageModel
*/
public $model;

protected function loadSite() {
$this->model = new MessageImageModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}