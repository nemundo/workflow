<?php
namespace Nemundo\Workflow\App\Dashboard\Data\Widget;
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
public $phpClass;

protected function loadModel() {
$this->tableName = "dashboard_widget";
$this->aliasTableName = "dashboard_widget";
$this->label = "Widget";

$this->primaryIndex = new \Nemundo\Db\Index\TextIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "dashboard_widget";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "dashboard_widget_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->widget = new \Nemundo\Model\Type\Text\TextType($this);
$this->widget->tableName = "dashboard_widget";
$this->widget->fieldName = "widget";
$this->widget->aliasFieldName = "dashboard_widget_widget";
$this->widget->label = "Widget";
$this->widget->allowNullValue = false;
$this->widget->length = 255;

$this->phpClass = new \Nemundo\Model\Type\Php\PhpClassType($this);
$this->phpClass->tableName = "dashboard_widget";
$this->phpClass->fieldName = "php_class";
$this->phpClass->aliasFieldName = "dashboard_widget_php_class";
$this->phpClass->label = "Php Class";
$this->phpClass->allowNullValue = false;
$this->phpClass->phpClassName = \Nemundo\Admin\Com\Widget\AbstractAdminWidget::class;

}
}