<?php
namespace Nemundo\Workflow\App\Dashboard\Data\DashboardContentType;
use Nemundo\Model\Form\ModelFormUpdate;
class DashboardContentTypeFormUpdate extends ModelFormUpdate {
/**
* @var DashboardContentTypeModel
*/
public $model;

protected function loadCom() {
$this->model = new DashboardContentTypeModel();
}
}