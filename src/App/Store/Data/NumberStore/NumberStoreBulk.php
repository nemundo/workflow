<?php
namespace Nemundo\Workflow\App\Store\Data\NumberStore;
class NumberStoreBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var NumberStoreModel
*/
protected $model;

/**
* @var string
*/
public $id;

/**
* @var int
*/
public $number;

public function __construct() {
parent::__construct();
$this->model = new NumberStoreModel();
}
public function save() {
$id = $this->id;
$this->typeValueList->setModelValue($this->model->id, $id);
$this->typeValueList->setModelValue($this->model->number, $this->number);
$id = parent::save();
return $id;
}
}