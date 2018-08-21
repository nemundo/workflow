<?php
namespace Nemundo\Workflow\App\Survey\Data\Survey2;
use Nemundo\Model\Id\AbstractModelIdValue;
class Survey2Id extends AbstractModelIdValue {
/**
* @var Survey2Model
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new Survey2Model();
}
}