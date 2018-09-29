<?php
namespace Nemundo\Workflow\App\SearchEngine\Data\Document;
use Nemundo\Model\View\ModelView;
class DocumentView extends ModelView {
/**
* @var DocumentModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new DocumentModel();
}
}