<?php
namespace Nemundo\Workflow\App\TeamInbox\Data\TeamUser;
class TeamUserPaginationReader extends \Nemundo\Model\Reader\AbstractModelPaginationDataReader {
/**
* @var TeamUserModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TeamUserModel();
}
/**
* @return TeamUserRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new TeamUserRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}