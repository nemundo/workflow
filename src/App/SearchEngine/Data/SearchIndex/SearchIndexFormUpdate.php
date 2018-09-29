<?php
namespace Nemundo\Workflow\App\SearchEngine\Data\SearchIndex;
use Nemundo\Model\Form\ModelFormUpdate;
class SearchIndexFormUpdate extends ModelFormUpdate {
/**
* @var SearchIndexModel
*/
public $model;

protected function loadCom() {
$this->model = new SearchIndexModel();
}
}