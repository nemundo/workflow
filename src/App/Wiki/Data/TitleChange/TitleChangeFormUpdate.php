<?php
namespace Nemundo\Workflow\App\Wiki\Data\TitleChange;
use Nemundo\Model\Form\ModelFormUpdate;
class TitleChangeFormUpdate extends ModelFormUpdate {
/**
* @var TitleChangeModel
*/
public $model;

protected function loadCom() {
$this->model = new TitleChangeModel();
}
protected function onSubmit() {
return parent::onSubmit();
}
}