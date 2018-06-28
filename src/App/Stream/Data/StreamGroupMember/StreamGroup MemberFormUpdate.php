<?php
namespace Nemundo\Workflow\App\Stream\Data\StreamGroupMember;
use Nemundo\Model\Form\ModelFormUpdate;
class StreamGroup MemberFormUpdate extends ModelFormUpdate {
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