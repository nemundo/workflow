<?php
namespace Nemundo\Workflow\App\SearchEngine\Data\Document;
use Nemundo\Model\Form\ModelFormUpdate;
class DocumentFormUpdate extends ModelFormUpdate {
/**
* @var DocumentModel
*/
public $model;

protected function loadCom() {
$this->model = new DocumentModel();
}
}