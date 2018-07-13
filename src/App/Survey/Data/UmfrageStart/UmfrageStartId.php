<?php
namespace Nemundo\Workflow\App\Survey\Data\UmfrageStart;
use Nemundo\Model\Id\AbstractModelIdValue;
class UmfrageStartId extends AbstractModelIdValue {
/**
* @var UmfrageStartModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UmfrageStartModel();
}
}