<?php
namespace Nemundo\Workflow\App\Dashboard\Data\UserWidget;
class UserWidgetValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var UserWidgetModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UserWidgetModel();
}
}