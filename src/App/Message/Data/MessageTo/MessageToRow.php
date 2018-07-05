<?php
namespace Nemundo\Workflow\App\Message\Data\MessageTo;
class MessageToRow extends \Nemundo\Model\Row\AbstractModelDataRow {
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
public $toId;

/**
* @var \Nemundo\User\Data\User\UserRow
*/
public $to;

/**
* @var string
*/
public $messageId;

/**
* @var \Nemundo\Workflow\App\Message\Data\Message\MessageRow
*/
public $message;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->toId = $this->getModelValue($model->toId);
if ($model->to !== null) {
$this->loadNemundoUserDataUserUsertoRow($model->to);
}
$this->messageId = $this->getModelValue($model->messageId);
if ($model->message !== null) {
$this->loadNemundoWorkflowAppMessageDataMessageMessagemessageRow($model->message);
}
}
private function loadNemundoUserDataUserUsertoRow($model) {
$this->to = new \Nemundo\User\Data\User\UserRow($this->row, $model);
}
private function loadNemundoWorkflowAppMessageDataMessageMessagemessageRow($model) {
$this->message = new \Nemundo\Workflow\App\Message\Data\Message\MessageRow($this->row, $model);
}
}