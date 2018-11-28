<?php
namespace Nemundo\Workflow\App\Store\Data\YesNoStore;
class YesNoStoreDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var YesNoStoreModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new YesNoStoreModel();
}
}