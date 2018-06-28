<?php
namespace Nemundo\Workflow\App\Stream\Data\StreamGroupMember;
class StreamGroup MemberForm extends \Nemundo\Design\Bootstrap\Form\BootstrapModelForm {
/**
* @var StreamGroup MemberModel
*/
public $model;

protected function loadCom() {
$this->model = new StreamGroup MemberModel();
}
protected function onSubmit() {
return parent::onSubmit();
}
}