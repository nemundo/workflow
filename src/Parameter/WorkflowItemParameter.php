<?php
namespace Nemundo\Workflow\Parameter;
use Nemundo\Web\Http\Parameter\AbstractUrlParameter;
class WorkflowItemParameter extends AbstractUrlParameter {
protected function loadParameter() {
$this->parameterName = 'workflowitem';
}
}