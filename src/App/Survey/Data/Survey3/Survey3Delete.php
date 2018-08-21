<?php
namespace Nemundo\Workflow\App\Survey\Data\Survey3;
class Survey3Delete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var Survey3Model
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new Survey3Model();
}
}