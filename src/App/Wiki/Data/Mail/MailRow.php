<?php
namespace Nemundo\Workflow\App\Wiki\Data\Mail;
class MailRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var MailModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
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

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->to = $this->getModelValue($model->to);
$this->subject = $this->getModelValue($model->subject);
$this->text = $this->getModelValue($model->text);
}
}