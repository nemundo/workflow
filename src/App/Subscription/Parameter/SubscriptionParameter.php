<?php
namespace Nemundo\Workflow\App\Subscription\Parameter;
use Nemundo\Web\Http\Parameter\AbstractGetParameter;
class SubscriptionParameter extends AbstractGetParameter {
protected function loadParameter() {
$this->parameterName = 'subscription';
}
}
