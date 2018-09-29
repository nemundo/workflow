<?php
namespace Nemundo\Workflow\App\Survey\Parameter;
use Nemundo\Web\Http\Parameter\AbstractUrlParameter;
class SurveyParameter extends AbstractUrlParameter {
protected function loadParameter() {
$this->parameterName = 'survey';
}
}