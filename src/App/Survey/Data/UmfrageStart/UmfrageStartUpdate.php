<?php
namespace Nemundo\Workflow\App\Survey\Data\UmfrageStart;
use Nemundo\Model\Data\AbstractModelUpdate;
class UmfrageStartUpdate extends AbstractModelUpdate {
/**
* @var UmfrageStartModel
*/
public $model;

/**
* @var string
*/
public $name;

/**
* @var string
*/
public $vorname;

public function __construct() {
parent::__construct();
$this->model = new UmfrageStartModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->name, $this->name);
$this->typeValueList->setModelValue($this->model->vorname, $this->vorname);
parent::update();
}
}