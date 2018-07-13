<?php
namespace Nemundo\Workflow\App\Survey\Data\UmfrageStart;
class UmfrageStartDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var UmfrageStartModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UmfrageStartModel();
}
}