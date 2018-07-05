<?php
namespace Nemundo\Workflow\App\Message\Parameter;
use Nemundo\Web\Http\Parameter\AbstractUrlParameter;
class MessageParameter extends AbstractUrlParameter {
protected function loadParameter() {
$this->parameterName = 'message';
}
}