<?php
namespace Nemundo\Workflow\App\Wiki\Parameter;
use Nemundo\Web\Http\Parameter\AbstractUrlParameter;
class PageParameter extends AbstractUrlParameter {
protected function loadParameter() {
$this->parameterName = 'wikipage';
}
}