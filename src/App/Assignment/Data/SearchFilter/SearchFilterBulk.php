<?php
namespace Nemundo\Workflow\App\Assignment\Data\SearchFilter;
class SearchFilterBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
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