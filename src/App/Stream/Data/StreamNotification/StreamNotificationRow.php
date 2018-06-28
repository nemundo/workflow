<?php
namespace Nemundo\Workflow\App\Stream\Data\StreamNotification;
class StreamNotificationRow extends \Nemundo\Model\Row\AbstractModelDataRow {
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
public $streamId;

/**
* @var \Nemundo\Workflow\App\Stream\Data\Stream\StreamRow
*/
public $stream;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->userId = $this->getModelValue($model->userId);
if ($model->user !== null) {
$this->loadNemundoUserDataUserUseruserRow($model->user);
}
$this->streamId = $this->getModelValue($model->streamId);
if ($model->stream !== null) {
$this->loadNemundoWorkflowAppStreamDataStreamStreamstreamRow($model->stream);
}
}
private function loadNemundoUserDataUserUseruserRow($model) {
$this->user = new \Nemundo\User\Data\User\UserRow($this->row, $model);
}
private function loadNemundoWorkflowAppStreamDataStreamStreamstreamRow($model) {
$this->stream = new \Nemundo\Workflow\App\Stream\Data\Stream\StreamRow($this->row, $model);
}
}