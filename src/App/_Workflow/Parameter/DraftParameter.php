<?php
namespace Nemundo\Workflow\App\Workflow\Parameter;
use Nemundo\Web\Http\Parameter\AbstractUrlParameter;
class DraftParameter extends AbstractUrlParameter {
protected function loadParameter() {
$this->parameterName = 'draft';
}
}