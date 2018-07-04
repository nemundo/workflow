<?php
namespace Nemundo\Workflow\App\Wiki\Data\Mail;
use Nemundo\Model\Site\AbstractModelAdminSite;
class MailAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var MailModel
*/
public $model;

protected function loadSite() {
$this->model = new MailModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}