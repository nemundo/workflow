<?php
namespace Nemundo\Workflow\App\SearchEngine\Data\Document;
class DocumentListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var DocumentModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new DocumentModel();
$this->label = $this->model->label;
}
}