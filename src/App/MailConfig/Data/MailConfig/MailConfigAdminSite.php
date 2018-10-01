<?php
namespace Nemundo\Workflow\App\MailConfig\Data\MailConfig;
use Nemundo\Model\Site\AbstractModelAdminSite;
class MailConfigAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var MailConfigModel
*/
public $model;

protected function loadSite() {
$this->model = new MailConfigModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}