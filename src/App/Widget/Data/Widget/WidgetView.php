<?php
namespace Nemundo\Workflow\App\Widget\Data\Widget;
use Nemundo\Model\View\ModelView;
class WidgetView extends ModelView {
/**
* @var WidgetModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new WidgetModel();
}
}