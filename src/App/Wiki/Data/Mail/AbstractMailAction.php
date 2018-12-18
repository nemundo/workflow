<?php
namespace Nemundo\Workflow\App\Wiki\Data\Mail;
use Nemundo\Model\Action\AbstractModelAction;
abstract class AbstractMailAction extends AbstractModelAction {
/**
* @return MailRow
*/
protected function getRow() {
$reader = new MailReader();
$reader->connection = $this->connection;
$row = $reader->getRowById($this->id);
return $row;
}
}