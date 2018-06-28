<?php
namespace Nemundo\Workflow\App\Stream\Data\Stream;
use Nemundo\Model\Form\ModelFormUpdate;
class StreamFormUpdate extends ModelFormUpdate {
/**
* @var StreamModel
*/
public $model;

protected function loadCom() {
$this->model = new StreamModel();
}
protected function onSubmit() {
return parent::onSubmit();
}
}