<?php
namespace Nemundo\Workflow\App\Store\Data\LargeTextStore;
class LargeTextStoreListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var LargeTextStoreModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new LargeTextStoreModel();
$this->label = $this->model->label;
}
}