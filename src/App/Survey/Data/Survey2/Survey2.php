<?php
namespace Nemundo\Workflow\App\Survey\Data\Survey2;
class Survey2 extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var Survey2Model
*/
protected $model;

/**
* @var string
*/
public $bemerkungen;

public function __construct() {
parent::__construct();
$this->model = new Survey2Model();
}
public function save() {
$this->typeValueList->setModelValue($this->model->bemerkungen, $this->bemerkungen);
$id = parent::save();
return $id;
}
}