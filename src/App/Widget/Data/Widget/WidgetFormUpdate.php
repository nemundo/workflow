<?php
namespace Nemundo\Workflow\App\Widget\Data\Widget;
use Nemundo\Model\Form\ModelFormUpdate;
class WidgetFormUpdate extends ModelFormUpdate {
/**
* @var WidgetModel
*/
public $model;

protected function loadCom() {
$this->model = new WidgetModel();
}
protected function onSubmit() {
return parent::onSubmit();
}
}