<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\TemplateLargeText;
use Nemundo\Model\Data\AbstractModelUpdate;
class TemplateLargeTextUpdate extends AbstractModelUpdate {
/**
* @var TemplateLargeTextModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TemplateLargeTextModel();
}
public function update() {
parent::update();
}
}