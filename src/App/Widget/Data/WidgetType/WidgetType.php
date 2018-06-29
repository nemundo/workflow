<?php
namespace Nemundo\Workflow\App\Widget\Data\WidgetType;
class WidgetType extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var WidgetTypeModel
*/
protected $model;

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
public function save() {
$this->typeValueList->setModelValue($this->model->widget, $this->widget);
$this->typeValueList->setModelValue($this->model->widgetTypeClass, $this->widgetTypeClass);
$id = parent::save();
return $id;
}
}