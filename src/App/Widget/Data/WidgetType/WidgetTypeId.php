<?php
namespace Nemundo\Workflow\App\Widget\Data\WidgetType;
use Nemundo\Model\Id\AbstractModelIdValue;
class WidgetTypeId extends AbstractModelIdValue {
/**
* @var WidgetTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WidgetTypeModel();
}
}