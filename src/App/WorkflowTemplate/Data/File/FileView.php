<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\File;
use Nemundo\Model\View\ModelView;
class FileView extends ModelView {
/**
* @var FileModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new FileModel();
}
}