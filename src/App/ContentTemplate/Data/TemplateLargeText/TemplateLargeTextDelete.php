<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\TemplateLargeText;
class TemplateLargeTextDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var TemplateLargeTextModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TemplateLargeTextModel();
}
}