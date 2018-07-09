<?php
namespace Nemundo\Workflow\App\Workflow\Data\Process;
use Nemundo\Model\Form\ModelFormUpdate;
class ProcessFormUpdate extends ModelFormUpdate {
/**
* @var ProcessModel
*/
public $model;

protected function loadCom() {
$this->model = new ProcessModel();
}
protected function onSubmit() {
return parent::onSubmit();
}
}