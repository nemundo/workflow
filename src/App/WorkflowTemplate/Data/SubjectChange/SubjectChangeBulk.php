<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\SubjectChange;
class SubjectChangeBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var SubjectChangeModel
*/
protected $model;

/**
* @var string
*/
public $subject;

public function __construct() {
parent::__construct();
$this->model = new SubjectChangeModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->subject, $this->subject);
$id = parent::save();
return $id;
}
}