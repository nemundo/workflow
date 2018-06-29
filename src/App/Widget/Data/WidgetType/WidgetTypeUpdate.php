<?php
namespace Nemundo\Workflow\App\Widget\Data\WidgetType;
use Nemundo\Model\Data\AbstractModelUpdate;
class WidgetTypeUpdate extends AbstractModelUpdate {
/**
* @var WidgetTypeModel
*/
public $model;

/**
* @var string
*/
public $widget;

/**
* @var string
*/
public $widgetTypeClass;

public function __construct() {
parent::__construct();
$this->model = new WidgetTypeModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->widget, $this->widget);
$this->typeValueList->setModelValue($this->model->widgetTypeClass, $this->widgetTypeClass);
parent::update();
}
}