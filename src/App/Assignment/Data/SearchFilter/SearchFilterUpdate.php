<?php
namespace Nemundo\Workflow\App\Assignment\Data\SearchFilter;
use Nemundo\Model\Data\AbstractModelUpdate;
class SearchFilterUpdate extends AbstractModelUpdate {
/**
* @var SearchFilterModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SearchFilterModel();
}
public function update() {
parent::update();
}
}