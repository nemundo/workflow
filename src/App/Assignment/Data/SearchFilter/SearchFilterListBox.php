<?php
namespace Nemundo\Workflow\App\Assignment\Data\SearchFilter;
class SearchFilterListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var SearchFilterModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new SearchFilterModel();
$this->label = $this->model->label;
}
}
