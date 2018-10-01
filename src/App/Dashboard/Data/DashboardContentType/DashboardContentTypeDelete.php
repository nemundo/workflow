<?php
namespace Nemundo\Workflow\App\Dashboard\Data\DashboardContentType;
class DashboardContentTypeDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var DashboardContentTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new DashboardContentTypeModel();
}
}