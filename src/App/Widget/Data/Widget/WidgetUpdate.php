<?php
namespace Nemundo\Workflow\App\Widget\Data\Widget;
use Nemundo\Model\Data\AbstractModelUpdate;
class WidgetUpdate extends AbstractModelUpdate {
/**
* @var WidgetModel
*/
public $model;

/**
* @var string
*/
public $widget;

/**
* @var string
*/
public $widgetClass;

public function __construct() {
parent::__construct();
$this->model = new WidgetModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->widget, $this->widget);
$this->typeValueList->setModelValue($this->model->widgetClass, $this->widgetClass);
parent::update();
}
}