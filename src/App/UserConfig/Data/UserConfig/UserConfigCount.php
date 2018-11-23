<?php
namespace Nemundo\Workflow\App\UserConfig\Data\UserConfig;
class UserConfigCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var UserConfigModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UserConfigModel();
}
}