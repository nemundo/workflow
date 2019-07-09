<?php
namespace Nemundo\Workflow\App\Dashboard\Data\Widget;
use Nemundo\Model\Id\AbstractModelIdValue;
class WidgetId extends AbstractModelIdValue {
/**
* @var WidgetModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WidgetModel();
}
}