<?php
namespace Nemundo\Workflow\App\UserConfig\Data\UserConfigText;
class UserConfigTextCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var UserConfigTextModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UserConfigTextModel();
}
}