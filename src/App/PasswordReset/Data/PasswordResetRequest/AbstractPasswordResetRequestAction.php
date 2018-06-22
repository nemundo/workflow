<?php
namespace Nemundo\Workflow\App\PasswordReset\Data\PasswordResetRequest;
use Nemundo\Model\Action\AbstractModelAction;
abstract class AbstractPasswordResetRequestAction extends AbstractModelAction {
/**
* @return PasswordResetRequestRow
*/
protected function getRow() {
$reader = new PasswordResetRequestReader();
$reader->connection = $this->connection;
$row = $reader->getRowById($this->id);
return $row;
}
}