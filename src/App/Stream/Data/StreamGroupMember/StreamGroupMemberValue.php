<?php
namespace Nemundo\Workflow\App\Stream\Data\StreamGroupMember;
class StreamGroupMemberValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var StreamGroupMemberModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new StreamGroupMemberModel();
}
}