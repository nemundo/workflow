<?php
namespace Nemundo\Workflow\App\Dashboard\Data\UserWidget;
class UserWidgetRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var UserWidgetModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $userId;

/**
* @var \Nemundo\User\Data\User\UserRow
*/
public $user;

/**
* @var string
*/
public $widgetId;

/**
* @var \Nemundo\Workflow\App\Dashboard\Data\Widget\WidgetRow
*/
public $widget;

/**
* @var int
*/
public $itemOrder;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->userId = $this->getModelValue($model->userId);
if ($model->user !== null) {
$this->loadNemundoUserDataUserUseruserRow($model->user);
}
$this->widgetId = $this->getModelValue($model->widgetId);
if ($model->widget !== null) {
$this->loadNemundoWorkflowAppDashboardDataWidgetWidgetwidgetRow($model->widget);
}
$this->itemOrder = $this->getModelValue($model->itemOrder);
}
private function loadNemundoUserDataUserUseruserRow($model) {
$this->user = new \Nemundo\User\Data\User\UserRow($this->row, $model);
}
private function loadNemundoWorkflowAppDashboardDataWidgetWidgetwidgetRow($model) {
$this->widget = new \Nemundo\Workflow\App\Dashboard\Data\Widget\WidgetRow($this->row, $model);
}
}