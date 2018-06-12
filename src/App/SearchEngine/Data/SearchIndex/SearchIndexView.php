<?php
namespace Nemundo\Workflow\App\SearchEngine\Data\SearchIndex;
use Nemundo\Model\View\ModelView;
class SearchIndexView extends ModelView {
/**
* @var SearchIndexModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new SearchIndexModel();
}
}