<?php
namespace Nemundo\Workflow\App\UserConfig\Data\UserConfigNumber;
use Nemundo\Model\Id\AbstractModelIdValue;
class UserConfigNumberId extends AbstractModelIdValue {
/**
* @var UserConfigNumberModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UserConfigNumberModel();
}
}