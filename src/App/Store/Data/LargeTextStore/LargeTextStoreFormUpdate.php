<?php
namespace Nemundo\Workflow\App\Store\Data\LargeTextStore;
use Nemundo\Model\Form\ModelFormUpdate;
class LargeTextStoreFormUpdate extends ModelFormUpdate {
/**
* @var LargeTextStoreModel
*/
public $model;

protected function loadCom() {
$this->model = new LargeTextStoreModel();
}
}