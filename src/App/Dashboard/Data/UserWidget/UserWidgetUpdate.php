<?php
namespace Nemundo\Workflow\App\Dashboard\Data\UserWidget;
use Nemundo\Model\Data\AbstractModelUpdate;
class UserWidgetUpdate extends AbstractModelUpdate {
/**
* @var UserWidgetModel
*/
public $model;

/**
* @var string
*/
public $userId;

/**
* @var string
*/
public $widgetId;

public function __construct() {
parent::__construct();
$this->model = new UserWidgetModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->userId, $this->userId);
$this->typeValueList->setModelValue($this->model->widgetId, $this->widgetId);
parent::update();
}
}