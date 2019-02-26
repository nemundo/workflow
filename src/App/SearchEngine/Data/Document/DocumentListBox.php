<?php
namespace Nemundo\Workflow\App\SearchEngine\Data\Document;
class DocumentListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var DocumentModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new DocumentModel();
$this->label = $this->model->label;
}
}