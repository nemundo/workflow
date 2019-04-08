<?php
namespace Nemundo\Workflow\App\Assignment\Parameter;
use Nemundo\Web\Http\Parameter\AbstractUrlParameter;
class SourceParameter extends AbstractUrlParameter {
protected function loadParameter() {
$this->parameterName = 'source';
}
}
