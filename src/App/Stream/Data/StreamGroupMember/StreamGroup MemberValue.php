<?php
namespace Nemundo\Workflow\App\Stream\Data\StreamGroupMember;
class StreamGroup MemberValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var StreamGroup MemberModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new StreamGroup MemberModel();
}
}