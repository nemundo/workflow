<?php
namespace Nemundo\Workflow\App\Widget\Data\Widget;
class WidgetModel extends \Nemundo\Model\Definition\Model\AbstractModel {
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
public $widgetClass;

protected function loadModel() {
$this->tableName = "widget_widget";
$this->aliasTableName = "widget_widget";
$this->label = "Widget";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "widget_widget";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "widget_widget_id";
$this->id->label = "Id";
$this->id->allowNullValue = "";
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->widget = new \Nemundo\Model\Type\Text\TextType($this);
$this->widget->tableName = "widget_widget";
$this->widget->fieldName = "widget";
$this->widget->aliasFieldName = "widget_widget_widget";
$this->widget->label = "Widget";
$this->widget->allowNullValue = "";
$this->widget->length = 255;

$this->widgetClass = new \Nemundo\Model\Type\Php\PhpClassType($this);
$this->widgetClass->tableName = "widget_widget";
$this->widgetClass->fieldName = "widget_class";
$this->widgetClass->aliasFieldName = "widget_widget_widget_class";
$this->widgetClass->label = "WidgetClass";
$this->widgetClass->allowNullValue = "";
$this->widgetClass->phpClassName = Nemundo\Admin\Com\Widget\AbstractAdminWidget::class;

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->addType($this->widgetClass);

$this->addDefaultType($this->widget);
$this->addDefaultOrderType($this->widget);
}
}