<?php
namespace Nemundo\Workflow\App\UserConfig\Data\UserConfigYesNo;
use Nemundo\Model\Id\AbstractModelIdValue;
class UserConfigYesNoId extends AbstractModelIdValue {
/**
* @var UserConfigYesNoModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UserConfigYesNoModel();
}
}