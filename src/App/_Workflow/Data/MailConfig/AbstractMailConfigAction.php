<?php
namespace Nemundo\Workflow\App\Workflow\Data\MailConfig;
use Nemundo\Model\Action\AbstractModelAction;
abstract class AbstractMailConfigAction extends AbstractModelAction {
/**
* @return MailConfigRow
*/
protected function getRow() {
$reader = new MailConfigReader();
$reader->connection = $this->connection;
$row = $reader->getRowById($this->id);
return $row;
}
}