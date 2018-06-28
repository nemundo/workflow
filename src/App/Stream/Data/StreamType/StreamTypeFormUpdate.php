<?php
namespace Nemundo\Workflow\App\Stream\Data\StreamType;
use Nemundo\Model\Form\ModelFormUpdate;
class StreamTypeFormUpdate extends ModelFormUpdate {
/**
* @var StreamTypeModel
*/
public $model;

protected function loadCom() {
$this->model = new StreamTypeModel();
}
protected function onSubmit() {
return parent::onSubmit();
}
}