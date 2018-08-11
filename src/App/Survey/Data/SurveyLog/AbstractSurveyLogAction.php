<?php
namespace Nemundo\Workflow\App\Survey\Data\SurveyLog;
use Nemundo\Model\Action\AbstractModelAction;
abstract class AbstractSurveyLogAction extends AbstractModelAction {
/**
* @return SurveyLogRow
*/
protected function getRow() {
$reader = new SurveyLogReader();
$reader->connection = $this->connection;
$row = $reader->getRowById($this->id);
return $row;
}
}