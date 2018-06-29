<?php
namespace Nemundo\Workflow\App\Widget\Data\WidgetType;
use Nemundo\Model\View\ModelView;
class WidgetTypeView extends ModelView {
/**
* @var WidgetTypeModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new WidgetTypeModel();
}
}