<?php
namespace Nemundo\Workflow\App\UserConfig\Data\UserConfig;
use Nemundo\Model\Id\AbstractModelIdValue;
class UserConfigId extends AbstractModelIdValue {
/**
* @var UserConfigModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UserConfigModel();
}
}