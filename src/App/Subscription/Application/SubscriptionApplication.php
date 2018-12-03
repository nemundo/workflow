<?php

namespace Nemundo\Workflow\App\Subscription\Application;


use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Workflow\App\Subscription\Data\SubscriptionCollection;

class SubscriptionApplication extends AbstractApplication
{

    protected function loadApplication()
    {
        $this->application = 'Subscription';
        $this->applicationName = 'subscription';
        $this->applicationId = '1c07da23-bd7a-482f-8ec1-78815b57d335';
        $this->modelCollectionClass = SubscriptionCollection::class;
    }

}