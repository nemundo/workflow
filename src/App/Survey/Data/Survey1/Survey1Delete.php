<?php
namespace Nemundo\Workflow\App\Survey\Data\Survey1;
class Survey1Delete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var Survey1Model
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new Survey1Model();
}
}