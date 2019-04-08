<?php
namespace Nemundo\Workflow\App\Assignment\Data\SearchFilter;
use Nemundo\Model\Id\AbstractModelIdValue;
class SearchFilterId extends AbstractModelIdValue {
/**
* @var SearchFilterModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SearchFilterModel();
}
}
