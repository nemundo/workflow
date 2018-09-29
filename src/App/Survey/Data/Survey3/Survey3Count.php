<?php
namespace Nemundo\Workflow\App\Survey\Data\Survey3;
class Survey3Count extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var Survey3Model
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new Survey3Model();
}
}