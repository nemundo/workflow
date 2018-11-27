<?php

namespace Nemundo\Workflow\App\Assignment\Config;


use Nemundo\Core\Language\LanguageCode;
use Nemundo\Workflow\App\UserConfig\Config\AbstractYesNoUserConfig;

class AssignmentSendMailConfig extends AbstractYesNoUserConfig
{

    protected function loadUserConfig()
    {

        $this->configId = 'c3e0c629-e556-433f-919f-51a478bfa5a2';
        $this->configLabel[LanguageCode::EN] = 'Assignment Mail';
        $this->configLabel[LanguageCode::DE] = 'Aufgaben Mail';

        $this->defaultValue = true;

    }

}