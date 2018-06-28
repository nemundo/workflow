<?php
namespace Nemundo\Workflow\App\Stream\Data\StreamGroupMember;
use Nemundo\Model\Id\AbstractModelIdValue;
class StreamGroup MemberId extends AbstractModelIdValue {
/**
* @var StreamGroup MemberModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new StreamGroup MemberModel();
}
}