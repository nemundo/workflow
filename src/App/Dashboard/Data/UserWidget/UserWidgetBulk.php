<?php
namespace Nemundo\Workflow\App\Dashboard\Data\UserWidget;
class UserWidgetBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var UserWidgetModel
*/
protected $model;

/**
* @var string
*/
public $userId;

/**
* @var string
*/
public $widgetId;

/**
* @var int
*/
public $itemOrder;

public function __construct() {
parent::__construct();
$this->model = new UserWidgetModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->userId, $this->userId);
$this->typeValueList->setModelValue($this->model->widgetId, $this->widgetId);
$this->typeValueList->setModelValue($this->model->itemOrder, $this->itemOrder);
$id = parent::save();
return $id;
}
}