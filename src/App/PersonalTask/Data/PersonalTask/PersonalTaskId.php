<?php
namespace Nemundo\Workflow\App\PersonalTask\Data\PersonalTask;
use Nemundo\Model\Id\AbstractModelIdValue;
class PersonalTaskId extends AbstractModelIdValue {
/**
* @var PersonalTaskModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PersonalTaskModel();
}
}