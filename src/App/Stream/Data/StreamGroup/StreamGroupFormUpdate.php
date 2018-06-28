<?php
namespace Nemundo\Workflow\App\Stream\Data\StreamGroup;
use Nemundo\Model\Form\ModelFormUpdate;
class StreamGroupFormUpdate extends ModelFormUpdate {
/**
* @var StreamGroupModel
*/
public $model;

protected function loadCom() {
$this->model = new StreamGroupModel();
}
protected function onSubmit() {
return parent::onSubmit();
}
}