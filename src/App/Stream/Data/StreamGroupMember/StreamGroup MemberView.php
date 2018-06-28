<?php
namespace Nemundo\Workflow\App\Stream\Data\StreamGroupMember;
use Nemundo\Model\View\ModelView;
class StreamGroup MemberView extends ModelView {
/**
* @var StreamGroup MemberModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new StreamGroup MemberModel();
}
}