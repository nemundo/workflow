<?php
namespace Nemundo\Workflow\App\Stream\Data\StreamGroupMember;
class StreamGroupMemberCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var StreamGroupMemberModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new StreamGroupMemberModel();
}
}