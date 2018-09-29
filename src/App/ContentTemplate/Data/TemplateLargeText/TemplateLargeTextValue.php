<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\TemplateLargeText;
class TemplateLargeTextValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var TemplateLargeTextModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TemplateLargeTextModel();
}
}