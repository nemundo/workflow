<?php
namespace Nemundo\Workflow\App\Stream\Data\StreamGroupMember;
class StreamGroupMemberRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $userId;

/**
* @var \Nemundo\User\Data\User\UserRow
*/
public $user;

/**
* @var string
*/
public $streamGroupId;

/**
* @var \Nemundo\Workflow\App\Stream\Data\StreamGroup\StreamGroupRow
*/
public $streamGroup;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->userId = $this->getModelValue($model->userId);
if ($model->user !== null) {
$this->loadNemundoUserDataUserUseruserRow($model->user);
}
$this->streamGroupId = $this->getModelValue($model->streamGroupId);
if ($model->streamGroup !== null) {
$this->loadNemundoWorkflowAppStreamDataStreamGroupStreamGroupstreamGroupRow($model->streamGroup);
}
}
private function loadNemundoUserDataUserUseruserRow($model) {
$this->user = new \Nemundo\User\Data\User\UserRow($this->row, $model);
}
private function loadNemundoWorkflowAppStreamDataStreamGroupStreamGroupstreamGroupRow($model) {
$this->streamGroup = new \Nemundo\Workflow\App\Stream\Data\StreamGroup\StreamGroupRow($this->row, $model);
}
}