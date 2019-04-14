<?php
namespace Nemundo\Workflow\App\Assignment\Data\AssignmentFilter;
class AssignmentFilterBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var AssignmentFilterModel
*/
protected $model;

/**
* @var string
*/
public $contentTypeId;

/**
* @var string
*/
public $filterLabel;

public function __construct() {
parent::__construct();
$this->model = new AssignmentFilterModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->contentTypeId, $this->contentTypeId);
$this->typeValueList->setModelValue($this->model->filterLabel, $this->filterLabel);
$id = parent::save();
return $id;
}
}