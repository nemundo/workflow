<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\TemplateLargeText;
class TemplateLargeTextAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var TemplateLargeTextModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new  TemplateLargeTextModel();
}
}