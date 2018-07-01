<?php
namespace Nemundo\Workflow\App\Inbox\Data\Inbox;
class InboxRow extends \Nemundo\Model\Row\AbstractModelDataRow {
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
public $contentTypeId;

/**
* @var \Nemundo\Workflow\Content\Data\ContentType\ContentTypeRow
*/
public $contentType;

/**
* @var string
*/
public $dataId;

/**
* @var string
*/
public $subject;

/**
* @var string
*/
public $userId;

/**
* @var \Nemundo\User\Data\User\UserRow
*/
public $user;

/**
* @var \Nemundo\Core\Type\DateTime\DateTime
*/
public $dateTime;

/**
* @var bool
*/
public $archive;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->contentTypeId = $this->getModelValue($model->contentTypeId);
if ($model->contentType !== null) {
$this->loadNemundoWorkflowContentDataContentTypeContentTypecontentTypeRow($model->contentType);
}
$this->dataId = $this->getModelValue($model->dataId);
$this->subject = $this->getModelValue($model->subject);
$this->userId = $this->getModelValue($model->userId);
if ($model->user !== null) {
$this->loadNemundoUserDataUserUseruserRow($model->user);
}
$this->dateTime = new \Nemundo\Core\Type\DateTime\DateTime($this->getModelValue($model->dateTime));
$this->archive = $this->getModelValue($model->archive);
}
private function loadNemundoWorkflowContentDataContentTypeContentTypecontentTypeRow($model) {
$this->contentType = new \Nemundo\Workflow\Content\Data\ContentType\ContentTypeRow($this->row, $model);
}
private function loadNemundoUserDataUserUseruserRow($model) {
$this->user = new \Nemundo\User\Data\User\UserRow($this->row, $model);
}
}