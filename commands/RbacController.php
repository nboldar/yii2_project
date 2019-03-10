<?php

namespace app\commands;

use yii\console\Controller;

class RbacController extends Controller
{
    /**
     * установка ролей с разграничением доступа
     */
    public function actionIndex()
    {
        $authManager = \Yii::$app->authManager;
        $productManager = $authManager->createRole('productManager');
        $authManager->add($productManager);
        $authManager->assign($productManager, 111);

        $permissionCreate = $authManager->getPermission('createTask');
        $permissionDelete = $authManager->getPermission('deleteTask');
        $permissionEdit = $authManager->getPermission('editTask');

        $authManager->addChild($productManager, $permissionCreate);
    }

}
