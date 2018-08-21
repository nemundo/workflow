<?php
namespace Nemundo\Workflow\App\Survey\Data\Survey1;
use Nemundo\Model\Data\AbstractModelUpdate;
class Survey1Update extends AbstractModelUpdate {
/**
* @var Survey1Model
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
$this->model = new Survey1Model();
}
public function update() {
$this->typeValueList->setModelValue($this->model->name, $this->name);
$this->typeValueList->setModelValue($this->model->vorname, $this->vorname);
parent::update();
}
}