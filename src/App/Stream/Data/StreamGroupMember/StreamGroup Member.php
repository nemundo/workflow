<?php
namespace Nemundo\Workflow\App\Stream\Data\StreamGroupMember;
class StreamGroup Member extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var StreamGroup MemberModel
*/
protected $model;

/**
* @var string
*/
public $userId;

public function __construct() {
parent::__construct();
$this->model = new StreamGroup MemberModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->userId, $this->userId);
$id = parent::save();
return $id;
}
}