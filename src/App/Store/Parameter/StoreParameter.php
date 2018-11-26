<?php
namespace Nemundo\Workflow\App\Store\Parameter;
use Nemundo\Web\Http\Parameter\AbstractUrlParameter;
class StoreParameter extends AbstractUrlParameter {
protected function loadParameter() {
$this->parameterName = 'store';
}
}