<?php
namespace Nemundo\Workflow\App\SearchEngine\Data\SearchIndex;
class SearchIndexListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var SearchIndexModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new SearchIndexModel();
$this->label = $this->model->label;
}
}