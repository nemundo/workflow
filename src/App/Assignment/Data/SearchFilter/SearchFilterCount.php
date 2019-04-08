<?php
namespace Nemundo\Workflow\App\Assignment\Data\SearchFilter;
class SearchFilterCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var SearchFilterModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SearchFilterModel();
}
}
