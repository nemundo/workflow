<?php

namespace Nemundo\Workflow\App\UserConfig\Config;


use Nemundo\User\Type\UserSessionType;
use Nemundo\Workflow\App\UserConfig\Data\UserConfigText\UserConfigText;
use Nemundo\Workflow\App\UserConfig\Data\UserConfigText\UserConfigTextCount;
use Nemundo\Workflow\App\UserConfig\Data\UserConfigText\UserConfigTextUpdate;
use Nemundo\Workflow\App\UserConfig\Data\UserConfigText\UserConfigTextValue;
use Nemundo\Workflow\App\UserConfig\Data\UserConfigUniqueId\UserConfigUniqueId;
use Nemundo\Workflow\App\UserConfig\Data\UserConfigUniqueId\UserConfigUniqueIdCount;
use Nemundo\Workflow\App\UserConfig\Data\UserConfigUniqueId\UserConfigUniqueIdUpdate;
use Nemundo\Workflow\App\UserConfig\Data\UserConfigUniqueId\UserConfigUniqueIdValue;

abstract class AbstractUniqueIdUserConfig extends AbstractUserConfig
{


    public function setValue($value)
    {

        $count = new UserConfigUniqueIdCount();
        $count->filter->andEqual($count->model->userId, (new UserSessionType())->userId);
        $count->filter->andEqual($count->model->userConfigId, $this->configId);
        if ($count->getCount() == 0) {

            $data = new UserConfigUniqueId();
            $data->userId = (new UserSessionType())->userId;
            $data->userConfigId = $this->configId;
            $data->value = $value;
            $data->save();

        } else {

            $update = new UserConfigUniqueIdUpdate();
            $update->filter->andEqual($count->model->userId, (new UserSessionType())->userId);
            $update->filter->andEqual($count->model->userConfigId, $this->configId);
            $update->value = $value;
            $update->update();

        }


    }


    public function getValue()
    {

        $value = $this->defaultValue;


        $count = new UserConfigUniqueIdCount();
        $count->filter->andEqual($count->model->userId, (new UserSessionType())->userId);
        $count->filter->andEqual($count->model->userConfigId, $this->configId);
        if ($count->getCount() == 1) {

            $configValue = new UserConfigUniqueIdValue();
            $configValue->field = $configValue->model->value;
            $configValue->filter->andEqual($count->model->userId, (new UserSessionType())->userId);
            $configValue->filter->andEqual($count->model->userConfigId, $this->configId);
            $value = $configValue->getValue();

        }

        return $value;


    }


}