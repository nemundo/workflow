<?php
namespace Nemundo\Workflow\App\Stream\Data\StreamGroupMember;
use Nemundo\Model\Data\AbstractModelUpdate;
class StreamGroup MemberUpdate extends AbstractModelUpdate {
/**
* @var StreamGroup MemberModel
*/
public $model;

/**
* @var string
*/
public $userId;

public function __construct() {
parent::__construct();
$this->model = new StreamGroup MemberModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->userId, $this->userId);
parent::update();
}
}