<?php
namespace Nemundo\Workflow\Data\SubjectChange;
class SubjectChange extends \Nemundo\Model\Data\AbstractModelData {
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