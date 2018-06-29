<?php
namespace Nemundo\Workflow\App\Widget\Data\WidgetType;
class WidgetTypeDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var WidgetTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WidgetTypeModel();
}
}