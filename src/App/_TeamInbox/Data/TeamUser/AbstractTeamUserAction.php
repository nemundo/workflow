<?php
namespace Nemundo\Workflow\App\TeamInbox\Data\TeamUser;
use Nemundo\Model\Action\AbstractModelAction;
abstract class AbstractTeamUserAction extends AbstractModelAction {
/**
* @return TeamUserRow
*/
protected function getRow() {
$reader = new TeamUserReader();
$reader->connection = $this->connection;
$row = $reader->getRowById($this->id);
return $row;
}
}