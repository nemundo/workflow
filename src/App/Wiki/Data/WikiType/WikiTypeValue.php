<?php
namespace Nemundo\Workflow\App\Wiki\Data\WikiType;
class WikiTypeValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var WikiTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WikiTypeModel();
}
}