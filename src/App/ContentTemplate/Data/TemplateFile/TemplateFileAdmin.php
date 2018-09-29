<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\TemplateFile;
class TemplateFileAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var TemplateFileModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new  TemplateFileModel();
}
}