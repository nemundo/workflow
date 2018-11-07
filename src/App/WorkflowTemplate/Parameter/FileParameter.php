<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Parameter;
use Nemundo\Web\Http\Parameter\AbstractUrlParameter;
class FileParameter extends AbstractUrlParameter {
protected function loadParameter() {
$this->parameterName = 'file';
}
}