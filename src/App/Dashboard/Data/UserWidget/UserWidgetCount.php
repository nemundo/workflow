<?php
namespace Nemundo\Workflow\App\Dashboard\Data\UserWidget;
class UserWidgetCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var UserWidgetModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UserWidgetModel();
}
}