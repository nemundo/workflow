<?php
namespace Nemundo\Workflow\Data\SubjectChange;
class SubjectChangeCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var SubjectChangeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SubjectChangeModel();
}
}