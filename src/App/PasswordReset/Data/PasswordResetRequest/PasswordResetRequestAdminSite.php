<?php
namespace Nemundo\Workflow\App\PasswordReset\Data\PasswordResetRequest;
use Nemundo\Model\Site\AbstractModelAdminSite;
class PasswordResetRequestAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var PasswordResetRequestModel
*/
public $model;

protected function loadSite() {
$this->model = new PasswordResetRequestModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}