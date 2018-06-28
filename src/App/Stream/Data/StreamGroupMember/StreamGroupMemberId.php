<?php
namespace Nemundo\Workflow\App\Stream\Data\StreamGroupMember;
use Nemundo\Model\Id\AbstractModelIdValue;
class StreamGroupMemberId extends AbstractModelIdValue {
/**
* @var StreamGroupMemberModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new StreamGroupMemberModel();
}
}