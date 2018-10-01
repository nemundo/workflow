<?php
namespace Nemundo\Workflow\App\Dashboard\Data\DashboardContentType;
class DashboardContentTypeValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var DashboardContentTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new DashboardContentTypeModel();
}
}