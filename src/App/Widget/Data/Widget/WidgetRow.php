<?php
namespace Nemundo\Workflow\App\Widget\Data\Widget;
class WidgetRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var WidgetModel
*/
public $model;

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
public $widgetClass;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->widget = $this->getModelValue($model->widget);
$this->widgetClass = $this->getModelValue($model->widgetClass);
}
/**
* @return \Nemundo\Admin\Com\Widget\AbstractAdminWidget
*/
public function getWidgetClassObject() {
$object = (new \Nemundo\Core\System\ObjectBuilder)->getObject($this->widgetClass);
return $object;
}
}