<?php
namespace Nemundo\Workflow\App\Store\Data\LargeTextStore;
class LargeTextStoreAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var LargeTextStoreModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new  LargeTextStoreModel();
}
}