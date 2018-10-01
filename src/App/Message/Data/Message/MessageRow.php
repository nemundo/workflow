<?php
namespace Nemundo\Workflow\App\Message\Data\Message;
class MessageRow extends \Nemundo\Model\Row\AbstractModelDataRow {
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
public $subject;

/**
* @var string
*/
public $text;

/**
* @var int
*/
public $count;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->toId = $this->getModelValue($model->toId);
if ($model->to !== null) {
$this->loadNemundoUserDataUserUsertoRow($model->to);
}
$this->subject = $this->getModelValue($model->subject);
$this->text = $this->getModelValue($model->text);
$this->count = $this->getModelValue($model->count);
}
private function loadNemundoUserDataUserUsertoRow($model) {
$this->to = new \Nemundo\User\Data\User\UserRow($this->row, $model);
}
}