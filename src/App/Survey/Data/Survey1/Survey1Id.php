<?php
namespace Nemundo\Workflow\App\Survey\Data\Survey1;
use Nemundo\Model\Id\AbstractModelIdValue;
class Survey1Id extends AbstractModelIdValue {
/**
* @var Survey1Model
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new Survey1Model();
}
}