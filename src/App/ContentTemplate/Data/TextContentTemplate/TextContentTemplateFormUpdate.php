<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\TextContentTemplate;
use Nemundo\Model\Form\ModelFormUpdate;
class TextContentTemplateFormUpdate extends ModelFormUpdate {
/**
* @var TextContentTemplateModel
*/
public $model;

protected function loadCom() {
$this->model = new TextContentTemplateModel();
}
}