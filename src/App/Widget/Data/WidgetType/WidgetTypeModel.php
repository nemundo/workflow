<?php
namespace Nemundo\Workflow\App\Widget\Data\WidgetType;
class WidgetTypeModel extends \Nemundo\Model\Definition\Model\AbstractModel {
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
public $widgetTypeClass;

protected function loadModel() {
$this->tableName = "widget_widget_type";
$this->aliasTableName = "widget_widget_type";
$this->label = "WidgetType";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "widget_widget_type";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "widget_widget_type_id";
$this->id->label = "Id";
$this->id->allowNullValue = "";
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->widget = new \Nemundo\Model\Type\Text\TextType($this);
$this->widget->tableName = "widget_widget_type";
$this->widget->fieldName = "widget";
$this->widget->aliasFieldName = "widget_widget_type_widget";
$this->widget->label = "Widget";
$this->widget->allowNullValue = "";
$this->widget->length = 255;

$this->widgetTypeClass = new \Nemundo\Model\Type\Php\PhpClassType($this);
$this->widgetTypeClass->tableName = "widget_widget_type";
$this->widgetTypeClass->fieldName = "widget_type_class";
$this->widgetTypeClass->aliasFieldName = "widget_widget_type_widget_type_class";
$this->widgetTypeClass->label = "WidgetTypeClass";
$this->widgetTypeClass->allowNullValue = "";
$this->widgetTypeClass->phpClassName = Nemundo\Admin\Com\Widget\AbstractAdminWidget::class;

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->addType($this->widgetTypeClass);

}
}