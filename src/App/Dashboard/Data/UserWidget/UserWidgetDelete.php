<?php
namespace Nemundo\Workflow\App\Dashboard\Data\UserWidget;
class UserWidgetDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var UserWidgetModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UserWidgetModel();
}
}