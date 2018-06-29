<?php
namespace Nemundo\Workflow\App\Calendar\Data\Calendar;
class CalendarRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var string
*/
public $id;

/**
* @var \Nemundo\Core\Type\DateTime\Date
*/
public $date;

/**
* @var string
*/
public $event;

/**
* @var string
*/
public $identificationTypeId;

/**
* @var \Nemundo\Workflow\App\Identification\Data\IdentificationType\IdentificationTypeRow
*/
public $identificationType;

/**
* @var string
*/
public $identificationId;

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

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$value = $this->getModelValue($model->date);
if ($value !== "0000-00-00") {
$this->date = new \Nemundo\Core\Type\DateTime\Date($this->getModelValue($model->date));
}
$this->event = $this->getModelValue($model->event);
$this->identificationTypeId = $this->getModelValue($model->identificationTypeId);
if ($model->identificationType !== null) {
$this->loadNemundoWorkflowAppIdentificationDataIdentificationTypeIdentificationTypeidentificationTypeRow($model->identificationType);
}
$this->identificationId = $this->getModelValue($model->identificationId);
$this->contentTypeId = $this->getModelValue($model->contentTypeId);
if ($model->contentType !== null) {
$this->loadNemundoWorkflowContentDataContentTypeContentTypecontentTypeRow($model->contentType);
}
$this->dataId = $this->getModelValue($model->dataId);
}
private function loadNemundoWorkflowAppIdentificationDataIdentificationTypeIdentificationTypeidentificationTypeRow($model) {
$this->identificationType = new \Nemundo\Workflow\App\Identification\Data\IdentificationType\IdentificationTypeRow($this->row, $model);
}
private function loadNemundoWorkflowContentDataContentTypeContentTypecontentTypeRow($model) {
$this->contentType = new \Nemundo\Workflow\Content\Data\ContentType\ContentTypeRow($this->row, $model);
}
}