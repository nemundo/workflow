<?php
namespace Nemundo\Workflow\App\Survey\Data\Survey;
use Nemundo\Model\Action\AbstractModelAction;
abstract class AbstractSurveyAction extends AbstractModelAction {
/**
* @return SurveyRow
*/
protected function getRow() {
$reader = new SurveyReader();
$reader->connection = $this->connection;
$row = $reader->getRowById($this->id);
return $row;
}
}