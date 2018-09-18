<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\TemplateLargeText;
class TemplateLargeText extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var TemplateLargeTextModel
*/
protected $model;

public function __construct() {
parent::__construct();
$this->model = new TemplateLargeTextModel();
}
public function save() {
$id = parent::save();
return $id;
}
}