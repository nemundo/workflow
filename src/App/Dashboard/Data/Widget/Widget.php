<?php
namespace Nemundo\Workflow\App\Dashboard\Data\Widget;
class Widget extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var WidgetModel
*/
protected $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $widget;

/**
* @var string
*/
public $phpClass;

public function __construct() {
parent::__construct();
$this->model = new WidgetModel();
}
public function save() {
$id = $this->id;
$this->typeValueList->setModelValue($this->model->id, $id);
$this->typeValueList->setModelValue($this->model->widget, $this->widget);
$this->typeValueList->setModelValue($this->model->phpClass, $this->phpClass);
$id = parent::save();
return $id;
}
}