<?php
namespace Nemundo\Workflow\App\Assignment\Data\SearchFilter;
class SearchFilter extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var SearchFilterModel
*/
protected $model;

public function __construct() {
parent::__construct();
$this->model = new SearchFilterModel();
}
public function save() {
$id = parent::save();
return $id;
}
}
