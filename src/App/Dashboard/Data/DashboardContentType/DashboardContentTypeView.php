<?php
namespace Nemundo\Workflow\App\Dashboard\Data\DashboardContentType;
use Nemundo\Model\View\ModelView;
class DashboardContentTypeView extends ModelView {
/**
* @var DashboardContentTypeModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new DashboardContentTypeModel();
}
}