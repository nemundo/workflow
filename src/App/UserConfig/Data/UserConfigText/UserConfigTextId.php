<?php
namespace Nemundo\Workflow\App\UserConfig\Data\UserConfigText;
use Nemundo\Model\Id\AbstractModelIdValue;
class UserConfigTextId extends AbstractModelIdValue {
/**
* @var UserConfigTextModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UserConfigTextModel();
}
}