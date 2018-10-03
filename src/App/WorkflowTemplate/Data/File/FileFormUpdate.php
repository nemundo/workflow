<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\File;
use Nemundo\Model\Form\ModelFormUpdate;
class FileFormUpdate extends ModelFormUpdate {
/**
* @var FileModel
*/
public $model;

protected function loadCom() {
$this->model = new FileModel();
}
}