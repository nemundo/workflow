<?php
namespace Nemundo\Workflow\App\UserConfig\Data\UserConfigUniqueId;
use Nemundo\Model\Id\AbstractModelIdValue;
class UserConfigUniqueIdId extends AbstractModelIdValue {
/**
* @var UserConfigUniqueIdModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UserConfigUniqueIdModel();
}
}