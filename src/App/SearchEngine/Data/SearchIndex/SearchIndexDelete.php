<?php
namespace Nemundo\Workflow\App\SearchEngine\Data\SearchIndex;
class SearchIndexDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var SearchIndexModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SearchIndexModel();
}
}