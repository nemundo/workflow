<?php

namespace Nemundo\Workflow\App\UserConfig\Config;


use Nemundo\User\Type\UserSession;
use Nemundo\Workflow\App\UserConfig\Data\UserConfigNumber\UserConfigNumber;
use Nemundo\Workflow\App\UserConfig\Data\UserConfigNumber\UserConfigNumberCount;
use Nemundo\Workflow\App\UserConfig\Data\UserConfigNumber\UserConfigNumberUpdate;
use Nemundo\Workflow\App\UserConfig\Data\UserConfigText\UserConfigText;
use Nemundo\Workflow\App\UserConfig\Data\UserConfigText\UserConfigTextCount;
use Nemundo\Workflow\App\UserConfig\Data\UserConfigText\UserConfigTextUpdate;
use Nemundo\Workflow\App\UserConfig\Data\UserConfigText\UserConfigTextValue;

abstract class AbstractNumberUserConfig extends AbstractUserConfig
{


    public function setValue($value)
    {

        $count = new UserConfigNumberCount();
        $count->filter->andEqual($count->model->userId, (new UserSession())->userId);
        $count->filter->andEqual($count->model->userConfigId, $this->configId);
        if ($count->getCount() == 0) {

            $data = new UserConfigNumber();
            $data->userId = (new UserSession())->userId;
            $data->userConfigId = $this->configId;
            $data->value = $value;
            $data->save();

        } else {

            $update = new UserConfigNumberUpdate();
            $update->filter->andEqual($count->model->userId, (new UserSession())->userId);
            $update->filter->andEqual($count->model->userConfigId, $this->configId);
            $update->value = $value;
            $update->update();

        }


    }


    public function getValue()
    {

        $value = $this->defaultValue;


        $count = new UserConfigTextCount();
        $count->filter->andEqual($count->model->userId, (new UserSession())->userId);
        $count->filter->andEqual($count->model->userConfigId, $this->configId);
        if ($count->getCount() == 1) {

            $configValue = new UserConfigTextValue();
            $configValue->field = $configValue->model->value;
            $configValue->filter->andEqual($count->model->userId, (new UserSession())->userId);
            $configValue->filter->andEqual($count->model->userConfigId, $this->configId);
            $value = $configValue->getValue();

        }

        return $value;


    }


}