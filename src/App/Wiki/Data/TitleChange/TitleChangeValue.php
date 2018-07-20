<?php
namespace Nemundo\Workflow\App\Wiki\Data\TitleChange;
class TitleChangeValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var TitleChangeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TitleChangeModel();
}
}