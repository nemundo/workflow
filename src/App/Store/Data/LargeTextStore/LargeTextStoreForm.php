<?php
namespace Nemundo\Workflow\App\Store\Data\LargeTextStore;
class LargeTextStoreForm extends \Nemundo\Package\Bootstrap\Form\BootstrapModelForm {
/**
* @var LargeTextStoreModel
*/
public $model;

protected function loadCom() {
$this->model = new LargeTextStoreModel();
}
}