<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\TextContentTemplate;
class TextContentTemplateAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var TextContentTemplateModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new  TextContentTemplateModel();
}
}