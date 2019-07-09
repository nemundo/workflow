<?php
namespace Nemundo\Workflow\App\Dashboard\Data\UserWidget;
use Nemundo\Model\Id\AbstractModelIdValue;
class UserWidgetId extends AbstractModelIdValue {
/**
* @var UserWidgetModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UserWidgetModel();
}
}