<?php
namespace Nemundo\Workflow\Data\SubjectChange;
class SubjectChangeDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var SubjectChangeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SubjectChangeModel();
}
}