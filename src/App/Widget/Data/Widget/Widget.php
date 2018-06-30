<?php
namespace Nemundo\Workflow\App\Widget\Data\Widget;
class Widget extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var WidgetModel
*/
protected $model;

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
public function save() {
$this->typeValueList->setModelValue($this->model->widget, $this->widget);
$this->typeValueList->setModelValue($this->model->widgetClass, $this->widgetClass);
$id = parent::save();
return $id;
}
}