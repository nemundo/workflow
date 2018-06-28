<?php
namespace Nemundo\Workflow\App\Stream\Data\StreamGroupMember;
use Nemundo\Model\Data\AbstractModelUpdate;
class StreamGroupMemberUpdate extends AbstractModelUpdate {
/**
* @var StreamGroupMemberModel
*/
public $model;

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
public function update() {
$this->typeValueList->setModelValue($this->model->userId, $this->userId);
$this->typeValueList->setModelValue($this->model->streamGroupId, $this->streamGroupId);
parent::update();
}
}