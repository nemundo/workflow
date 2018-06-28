<?php
namespace Nemundo\Workflow\App\Stream\Data\StreamGroupMember;
use Nemundo\Model\Form\ModelFormUpdate;
class StreamGroupMemberFormUpdate extends ModelFormUpdate {
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