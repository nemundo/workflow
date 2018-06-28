<?php
namespace Nemundo\Workflow\App\Stream\Data\StreamGroupMember;
class StreamGroupMember extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var StreamGroupMemberModel
*/
protected $model;

/**
* @var string
*/
public $userId;

/**
* @var string
*/
public $streamGroupId;

public function __construct() {
parent::__construct();
$this->model = new StreamGroupMemberModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->userId, $this->userId);
$this->typeValueList->setModelValue($this->model->streamGroupId, $this->streamGroupId);
$id = parent::save();
return $id;
}
}