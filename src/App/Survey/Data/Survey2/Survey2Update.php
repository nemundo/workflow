<?php
namespace Nemundo\Workflow\App\Survey\Data\Survey2;
use Nemundo\Model\Data\AbstractModelUpdate;
class Survey2Update extends AbstractModelUpdate {
/**
* @var Survey2Model
*/
public $model;

/**
* @var string
*/
public $bemerkungen;

public function __construct() {
parent::__construct();
$this->model = new Survey2Model();
}
public function update() {
$this->typeValueList->setModelValue($this->model->bemerkungen, $this->bemerkungen);
parent::update();
}
}