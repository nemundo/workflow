<?php
namespace Nemundo\Workflow\App\Stream\Data\StreamGroup;
class StreamGroupForm extends \Nemundo\Design\Bootstrap\Form\BootstrapModelForm {
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