<?php
namespace Nemundo\Workflow\App\Store\Data\YesNoStore;
use Nemundo\Model\Id\AbstractModelIdValue;
class YesNoStoreId extends AbstractModelIdValue {
/**
* @var YesNoStoreModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new YesNoStoreModel();
}
}