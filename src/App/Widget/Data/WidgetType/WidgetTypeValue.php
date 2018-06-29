<?php
namespace Nemundo\Workflow\App\Widget\Data\WidgetType;
class WidgetTypeValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var WidgetTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WidgetTypeModel();
}
}