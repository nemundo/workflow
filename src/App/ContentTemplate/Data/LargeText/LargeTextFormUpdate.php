<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\LargeText;
use Nemundo\Model\Form\ModelFormUpdate;
class LargeTextFormUpdate extends ModelFormUpdate {
/**
* @var LargeTextModel
*/
public $model;

protected function loadCom() {
$this->model = new LargeTextModel();
}
protected function onSubmit() {
return parent::onSubmit();
}
}