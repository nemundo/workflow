<?php
namespace Nemundo\Workflow\App\Widget\Data\WidgetType;
class WidgetTypeRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

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
public $widgetTypeClass;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->widget = $this->getModelValue($model->widget);
$this->widgetTypeClass = $this->getModelValue($model->widgetTypeClass);
}
/**
* @return \Nemundo\Admin\Com\Widget\AbstractAdminWidget
*/
public function getWidgetTypeClassObject() {
$object = (new \Nemundo\Core\System\ObjectBuilder)->getObject($this->widgetTypeClass);
return $object;
}
}