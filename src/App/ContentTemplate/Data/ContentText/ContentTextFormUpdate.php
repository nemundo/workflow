<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\ContentText;
use Nemundo\Model\Form\ModelFormUpdate;
class ContentTextFormUpdate extends ModelFormUpdate {
/**
* @var ContentTextModel
*/
public $model;

protected function loadCom() {
$this->model = new ContentTextModel();
}
}