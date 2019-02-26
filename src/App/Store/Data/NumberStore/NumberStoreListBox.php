<?php
namespace Nemundo\Workflow\App\Store\Data\NumberStore;
class NumberStoreListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var NumberStoreModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new NumberStoreModel();
$this->label = $this->model->label;
}
}