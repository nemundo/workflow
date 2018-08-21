<?php
namespace Nemundo\Workflow\App\SearchEngine\Data\SearchIndex;
class SearchIndexAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var SearchIndexModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new  SearchIndexModel();
}
}