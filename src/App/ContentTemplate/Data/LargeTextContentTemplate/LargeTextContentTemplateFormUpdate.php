<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\LargeTextContentTemplate;
use Nemundo\Model\Form\ModelFormUpdate;
class LargeTextContentTemplateFormUpdate extends ModelFormUpdate {
/**
* @var LargeTextContentTemplateModel
*/
public $model;

protected function loadCom() {
$this->model = new LargeTextContentTemplateModel();
}
}