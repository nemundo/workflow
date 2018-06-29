<?php
namespace Nemundo\Workflow\App\Identification\Data\IdentificationType;
use Nemundo\Model\Site\AbstractModelAdminSite;
class IdentificationTypeAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var IdentificationTypeModel
*/
public $model;

protected function loadSite() {
$this->model = new IdentificationTypeModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}