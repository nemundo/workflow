<?php
namespace Nemundo\Workflow\App\SearchEngine\Data\Document;
class DocumentAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var DocumentModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new  DocumentModel();
}
}