<?php
namespace Nemundo\Workflow\Data\SubjectChange;
use Nemundo\Model\Id\AbstractModelIdValue;
class SubjectChangeId extends AbstractModelIdValue {
/**
* @var SubjectChangeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SubjectChangeModel();
}
}