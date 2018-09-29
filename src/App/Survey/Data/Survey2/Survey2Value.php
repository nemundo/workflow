<?php
namespace Nemundo\Workflow\App\Survey\Data\Survey2;
class Survey2Value extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var Survey2Model
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new Survey2Model();
}
}