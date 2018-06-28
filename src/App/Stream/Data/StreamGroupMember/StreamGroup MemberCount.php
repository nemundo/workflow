<?php
namespace Nemundo\Workflow\App\Stream\Data\StreamGroupMember;
class StreamGroup MemberCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var StreamGroup MemberModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new StreamGroup MemberModel();
}
}