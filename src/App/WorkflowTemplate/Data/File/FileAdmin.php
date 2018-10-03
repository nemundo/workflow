<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\File;
class FileAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var FileModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new  FileModel();
}
}