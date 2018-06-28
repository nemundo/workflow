<?php
namespace Nemundo\Workflow\App\Stream\Data\StreamGroupMember;
class StreamGroupMemberDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var StreamGroupMemberModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new StreamGroupMemberModel();
}
}