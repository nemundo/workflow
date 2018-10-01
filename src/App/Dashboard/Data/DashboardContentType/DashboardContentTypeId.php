<?php
namespace Nemundo\Workflow\App\Dashboard\Data\DashboardContentType;
use Nemundo\Model\Id\AbstractModelIdValue;
class DashboardContentTypeId extends AbstractModelIdValue {
/**
* @var DashboardContentTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new DashboardContentTypeModel();
}
}