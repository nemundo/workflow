<?php
namespace Nemundo\Workflow\App\Widget\Data\WidgetType;
class WidgetTypeCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var WidgetTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WidgetTypeModel();
}
}