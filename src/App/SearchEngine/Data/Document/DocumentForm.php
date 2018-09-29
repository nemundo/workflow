<?php
namespace Nemundo\Workflow\App\SearchEngine\Data\Document;
class DocumentForm extends \Nemundo\Package\Bootstrap\Form\BootstrapModelForm {
/**
* @var DocumentModel
*/
public $model;

protected function loadCom() {
$this->model = new DocumentModel();
}
}