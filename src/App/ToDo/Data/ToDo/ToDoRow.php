<?php
namespace Nemundo\Workflow\App\ToDo\Data\ToDo;
class ToDoRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var ToDoModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $statusId;

/**
* @var \Nemundo\App\Content\Data\ContentType\ContentTypeRow
*/
public $status;

/**
* @var string
*/
public $statusDataId;

/**
* @var bool
*/
public $closed;

/**
* @var string
*/
public $todo;

/**
* @var bool
*/
public $done;

/**
* @var string
*/
public $userId;

/**
* @var \Nemundo\User\Data\User\UserRow
*/
public $user;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->statusId = $this->getModelValue($model->statusId);
if ($model->status !== null) {
$this->loadNemundoAppContentDataContentTypeContentTypestatusRow($model->status);
}
$this->statusDataId = $this->getModelValue($model->statusDataId);
$this->closed = boolval($this->getModelValue($model->closed));
$this->todo = $this->getModelValue($model->todo);
$this->done = boolval($this->getModelValue($model->done));
$this->userId = $this->getModelValue($model->userId);
if ($model->user !== null) {
$this->loadNemundoUserDataUserUseruserRow($model->user);
}
}
private function loadNemundoAppContentDataContentTypeContentTypestatusRow($model) {
$this->status = new \Nemundo\App\Content\Data\ContentType\ContentTypeRow($this->row, $model);
}
private function loadNemundoUserDataUserUseruserRow($model) {
$this->user = new \Nemundo\User\Data\User\UserRow($this->row, $model);
}
}