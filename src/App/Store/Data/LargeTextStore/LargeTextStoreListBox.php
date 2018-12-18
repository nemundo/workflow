<?php
namespace Nemundo\Workflow\App\Store\Data\LargeTextStore;
class LargeTextStoreListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var LargeTextStoreModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new LargeTextStoreModel();
$this->label = $this->model->label;
}
}