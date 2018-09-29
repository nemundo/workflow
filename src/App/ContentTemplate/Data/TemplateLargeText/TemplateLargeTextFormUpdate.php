<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\TemplateLargeText;
use Nemundo\Model\Form\ModelFormUpdate;
class TemplateLargeTextFormUpdate extends ModelFormUpdate {
/**
* @var TemplateLargeTextModel
*/
public $model;

protected function loadCom() {
$this->model = new TemplateLargeTextModel();
}
}