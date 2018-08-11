<?php
namespace Nemundo\Workflow\App\SearchEngine\Data\SearchIndex;
class SearchIndexListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var SearchIndexModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new SearchIndexModel();
$this->label = $this->model->label;
}
}