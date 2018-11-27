<?php

namespace Nemundo\Workflow\App\Notification\Config;


use Nemundo\Core\Language\LanguageCode;
use Nemundo\Workflow\App\UserConfig\Config\AbstractYesNoUserConfig;

class NotificationSendMailConfig extends AbstractYesNoUserConfig
{

    protected function loadUserConfig()
    {

        $this->configId = '035b6083-2613-49c1-b12b-401c578bdfad';
        $this->configLabel[LanguageCode::EN] = 'Notification Mail';
        $this->configLabel[LanguageCode::DE] = 'Benachrichtigung Mail';

        $this->defaultValue = true;

    }

}