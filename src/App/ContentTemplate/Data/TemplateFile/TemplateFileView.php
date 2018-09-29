<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\TemplateFile;
use Nemundo\Model\View\ModelView;
class TemplateFileView extends ModelView {
/**
* @var TemplateFileModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new TemplateFileModel();
}
}