<?php
namespace Nemundo\Workflow\App\Survey\Data\Survey3;
use Nemundo\Model\Id\AbstractModelIdValue;
class Survey3Id extends AbstractModelIdValue {
/**
* @var Survey3Model
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new Survey3Model();
}
}