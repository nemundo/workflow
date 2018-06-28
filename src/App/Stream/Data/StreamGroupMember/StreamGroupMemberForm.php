<?php
namespace Nemundo\Workflow\App\Stream\Data\StreamGroupMember;
class StreamGroupMemberForm extends \Nemundo\Design\Bootstrap\Form\BootstrapModelForm {
/**
* @var StreamGroupMemberModel
*/
public $model;

protected function loadCom() {
$this->model = new StreamGroupMemberModel();
}
protected function onSubmit() {
return parent::onSubmit();
}
}