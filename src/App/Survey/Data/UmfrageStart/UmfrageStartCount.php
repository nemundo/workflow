<?php
namespace Nemundo\Workflow\App\Survey\Data\UmfrageStart;
class UmfrageStartCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var UmfrageStartModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UmfrageStartModel();
}
}