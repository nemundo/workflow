<?php
namespace Nemundo\Workflow\App\Assignment\Data\SearchFilter;
class SearchFilterDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var SearchFilterModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SearchFilterModel();
}
}