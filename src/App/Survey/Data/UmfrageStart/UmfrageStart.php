<?php
namespace Nemundo\Workflow\App\Survey\Data\UmfrageStart;
class UmfrageStart extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var UmfrageStartModel
*/
protected $model;

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
public function save() {
$this->typeValueList->setModelValue($this->model->name, $this->name);
$this->typeValueList->setModelValue($this->model->vorname, $this->vorname);
$id = parent::save();
return $id;
}
}