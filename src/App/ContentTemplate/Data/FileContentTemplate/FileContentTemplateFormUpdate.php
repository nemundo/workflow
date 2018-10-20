<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\FileContentTemplate;
use Nemundo\Model\Form\ModelFormUpdate;
class FileContentTemplateFormUpdate extends ModelFormUpdate {
/**
* @var FileContentTemplateModel
*/
public $model;

protected function loadCom() {
$this->model = new FileContentTemplateModel();
}
}