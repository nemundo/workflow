<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\TemplateFile;
use Nemundo\Model\Form\ModelFormUpdate;
class TemplateFileFormUpdate extends ModelFormUpdate {
/**
* @var TemplateFileModel
*/
public $model;

protected function loadCom() {
$this->model = new TemplateFileModel();
}
}