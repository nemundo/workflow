<?php

namespace Nemundo\Workflow\App\UserConfig\Config;


use Nemundo\User\Session\UserSession;
use Nemundo\Workflow\App\UserConfig\Data\UserConfigYesNo\UserConfigYesNo;
use Nemundo\Workflow\App\UserConfig\Data\UserConfigYesNo\UserConfigYesNoCount;
use Nemundo\Workflow\App\UserConfig\Data\UserConfigYesNo\UserConfigYesNoUpdate;
use Nemundo\Workflow\App\UserConfig\Data\UserConfigYesNo\UserConfigYesNoValue;

abstract class AbstractYesNoUserConfig extends AbstractUserConfig
{

    /**
     * @var bool
     */
    public $defaultValue = false;

    public function setValue($value)
    {

        $count = new UserConfigYesNoCount();
        $count->filter->andEqual($count->model->userId, (new UserSession())->userId);
        $count->filter->andEqual($count->model->userConfigId, $this->configId);
        if ($count->getCount() == 0) {

            $data = new UserConfigYesNo();
            $data->userId = (new UserSession())->userId;
            $data->userConfigId = $this->configId;
            $data->value = $value;
            $data->save();

        } else {

            $update = new UserConfigYesNoUpdate();
            $update->filter->andEqual($count->model->userId, (new UserSession())->userId);
            $update->filter->andEqual($count->model->userConfigId, $this->configId);
            $update->value = $value;
            $update->update();

        }

    }


    public function getValue()
    {

        /*$value = $this->defaultValue;

        $count = new UserConfigYesNoCount();
        $count->filter->andEqual($count->model->userId, (new UserSession())->userId);
        $count->filter->andEqual($count->model->userConfigId, $this->configId);
        if ($count->getCount() == 1) {

            $configValue = new UserConfigYesNoValue();
            $configValue->field = $configValue->model->value;
            $configValue->filter->andEqual($count->model->userId, (new UserSession())->userId);
            $configValue->filter->andEqual($count->model->userConfigId, $this->configId);
            $value = $configValue->getValue();

        }*/

        $value = $this->getValueByUserId((new UserSession())->userId);
        return $value;

    }


    public function getValueByUserId($userId) {

        $value = $this->defaultValue;

        $count = new UserConfigYesNoCount();
        $count->filter->andEqual($count->model->userId,$userId);
        $count->filter->andEqual($count->model->userConfigId, $this->configId);
        if ($count->getCount() == 1) {

            $configValue = new UserConfigYesNoValue();
            $configValue->field = $configValue->model->value;
            $configValue->filter->andEqual($count->model->userId, $userId);
            $configValue->filter->andEqual($count->model->userConfigId, $this->configId);
            $value = $configValue->getValue();

        }

        return $value;

    }

}