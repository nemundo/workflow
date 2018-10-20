<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\FileContentTemplate;
class FileContentTemplateAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var FileContentTemplateModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new  FileContentTemplateModel();
}
}