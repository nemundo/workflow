<?php
namespace Nemundo\Workflow\App\SearchEngine\Data\SearchIndex;
class SearchIndexForm extends \Nemundo\Package\Bootstrap\Form\BootstrapModelForm {
/**
* @var SearchIndexModel
*/
public $model;

protected function loadCom() {
$this->model = new SearchIndexModel();
}
}