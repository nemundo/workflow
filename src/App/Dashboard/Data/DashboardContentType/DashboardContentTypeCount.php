<?php
namespace Nemundo\Workflow\App\Dashboard\Data\DashboardContentType;
class DashboardContentTypeCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var DashboardContentTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new DashboardContentTypeModel();
}
}