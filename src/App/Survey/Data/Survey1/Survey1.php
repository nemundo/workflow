<?php
namespace Nemundo\Workflow\App\Survey\Data\Survey1;
class Survey1 extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var Survey1Model
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
$this->model = new Survey1Model();
}
public function save() {
$this->typeValueList->setModelValue($this->model->name, $this->name);
$this->typeValueList->setModelValue($this->model->vorname, $this->vorname);
$id = parent::save();
return $id;
}
}