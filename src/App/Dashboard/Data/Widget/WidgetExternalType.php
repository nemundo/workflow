<?php
namespace Nemundo\Workflow\App\Dashboard\Data\Widget;
class WidgetExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $widget;

/**
* @var \Nemundo\Model\Type\Php\PhpClassType
*/
public $phpClass;

protected function loadType() {
parent::loadType();
$this->externalModelClassName = WidgetModel::class;
$this->externalTableName = "dashboard_widget";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->widget = new \Nemundo\Model\Type\Text\TextType();
$this->widget->fieldName = "widget";
$this->widget->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->widget->aliasFieldName = $this->widget->tableName . "_" . $this->widget->fieldName;
$this->widget->label = "Widget";
$this->addType($this->widget);

$this->phpClass = new \Nemundo\Model\Type\Php\PhpClassType();
$this->phpClass->fieldName = "php_class";
$this->phpClass->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->phpClass->aliasFieldName = $this->phpClass->tableName . "_" . $this->phpClass->fieldName;
$this->phpClass->label = "Php Class";
$this->addType($this->phpClass);

}
}