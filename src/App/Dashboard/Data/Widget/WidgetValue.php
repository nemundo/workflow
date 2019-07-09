<?php
namespace Nemundo\Workflow\App\Dashboard\Data\Widget;
class WidgetValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var WidgetModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WidgetModel();
}
}