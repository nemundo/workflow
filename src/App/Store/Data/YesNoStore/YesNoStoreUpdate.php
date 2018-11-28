<?php
namespace Nemundo\Workflow\App\Store\Data\YesNoStore;
use Nemundo\Model\Data\AbstractModelUpdate;
class YesNoStoreUpdate extends AbstractModelUpdate {
/**
* @var YesNoStoreModel
*/
public $model;

/**
* @var bool
*/
public $value;

public function __construct() {
parent::__construct();
$this->model = new YesNoStoreModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->value, $this->value);
parent::update();
}
}