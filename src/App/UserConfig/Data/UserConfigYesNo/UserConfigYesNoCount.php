<?php
namespace Nemundo\Workflow\App\UserConfig\Data\UserConfigYesNo;
class UserConfigYesNoCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var UserConfigYesNoModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UserConfigYesNoModel();
}
}