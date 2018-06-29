<?php
namespace Nemundo\Workflow\App\Widget\Data\WidgetType;
use Nemundo\Model\Form\ModelFormUpdate;
class WidgetTypeFormUpdate extends ModelFormUpdate {
/**
* @var WidgetTypeModel
*/
public $model;

protected function loadCom() {
$this->model = new WidgetTypeModel();
}
protected function onSubmit() {
return parent::onSubmit();
}
}