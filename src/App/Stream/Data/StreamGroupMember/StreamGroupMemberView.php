<?php
namespace Nemundo\Workflow\App\Stream\Data\StreamGroupMember;
use Nemundo\Model\View\ModelView;
class StreamGroupMemberView extends ModelView {
/**
* @var StreamGroupMemberModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new StreamGroupMemberModel();
}
}