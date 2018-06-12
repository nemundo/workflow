<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\SubjectChange;
use Nemundo\Model\Data\AbstractModelUpdate;
class SubjectChangeUpdate extends AbstractModelUpdate {
/**
* @var SubjectChangeModel
*/
public $model;

/**
* @var string
*/
public $subject;

public function __construct() {
parent::__construct();
$this->model = new SubjectChangeModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->subject, $this->subject);
parent::update();
}
}