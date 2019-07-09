<?php
namespace Nemundo\Workflow\App\Dashboard\Data\Widget;
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
public $phpClass;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->widget = $this->getModelValue($model->widget);
$this->phpClass = $this->getModelValue($model->phpClass);
}
/**
* @return \Nemundo\Admin\Com\Widget\AbstractAdminWidget
*/
public function getPhpClassObject() {
$object = (new \Nemundo\Core\System\ObjectBuilder)->getObject($this->phpClass);
return $object;
}
}