<?php
namespace Nemundo\Workflow\App\Store\Data\YesNoStore;
class YesNoStoreValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var YesNoStoreModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new YesNoStoreModel();
}
}