<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\LargeTextContentTemplate;
class LargeTextContentTemplateAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var LargeTextContentTemplateModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new  LargeTextContentTemplateModel();
}
}