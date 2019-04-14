<?php
namespace Nemundo\Workflow\App\Store\Data\YesNoStore;
class YesNoStoreBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var YesNoStoreModel
*/
protected $model;

/**
* @var string
*/
public $id;

/**
* @var bool
*/
public $value;

public function __construct() {
parent::__construct();
$this->model = new YesNoStoreModel();
}
public function save() {
$id = $this->id;
$this->typeValueList->setModelValue($this->model->id, $id);
$this->typeValueList->setModelValue($this->model->value, $this->value);
$id = parent::save();
return $id;
}
}