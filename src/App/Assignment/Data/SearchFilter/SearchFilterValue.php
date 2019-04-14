<?php
namespace Nemundo\Workflow\App\Assignment\Data\SearchFilter;
class SearchFilterValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var SearchFilterModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SearchFilterModel();
}
}