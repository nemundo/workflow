<?php
namespace Nemundo\Workflow\App\Store\Data\YesNoStore;
class YesNoStoreCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var YesNoStoreModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new YesNoStoreModel();
}
}