<?php

namespace Nemundo\Workflow\App\UserConfig\Setup;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Workflow\App\UserConfig\Data\UserConfig\AbstractUserConfig;
use Nemundo\Workflow\App\UserConfig\Data\UserConfig\UserConfig;

class UserConfigSetup extends AbstractBase
{

    public function addUserConfig(AbstractUserConfig $userConfig)
    {


        $data = new UserConfig();
        $data->id = $userConfig->configId;
        $data->userConfig = $userConfig->configLabel;
        $data->save();

        return $this;


    }

}