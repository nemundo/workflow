<?php
namespace Nemundo\Workflow\App\Subscription\Parameter;
use Nemundo\Web\Parameter\AbstractUrlParameter;
class SubscriptionParameter extends AbstractUrlParameter {
protected function loadParameter() {
$this->parameterName = 'subscription';
}
}
