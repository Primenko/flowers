<?php

namespace app\controllers;

use app\components\Controller;
use app\models\Flowers;
use app\models\FlowerSlice;
use yii\data\Pagination;
use yii\filters\AccessControl;


class FlowersController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::class,
                'only' => ['add'],
                'rules' => [
                    [
//                        'actions' => ['add'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $query = Flowers::find();

        $pagination = new Pagination([
            'defaultPageSize' => 15,
            'totalCount' => $query->count(),
        ]);

        $flowers = $query->orderBy('id')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('flowers', [
            'flowers' => $flowers,
            'pagination' => $pagination,
        ]);
    }

    public function actionFlowersSlice()
    {
        $query = FlowerSlice::find();
        $flowers = Flowers::find()->all();
        $flowersAr = [];
        foreach ($flowers as $flower) {
            $flowersAr[$flower->id] = $flower->name_ru;
        }

        $pagination = new Pagination([
            'defaultPageSize' => 15,
            'totalCount' => $query->count(),
        ]);

        $flowersSlice = $query->orderBy('id')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('flowersSlice', [
            'flowersSlice' => $flowersSlice,
            'flowersAr' => $flowersAr,
            'pagination' => $pagination,
        ]);
    }

    public function actionAddFlower()
    {
        $model = new Flowers;

        if ($model->load(\Yii::$app->request->post())) {

            $model->name_en = $model->name_ru;
            $model->date_added = date('Y-m-d H:i:s');
            if ($model->save()) {
                return $this->redirect('/flowers');
            }
        }

        return $this->render('addFlower', ['model' => $model]);
    }

    public function actionAddSlice()
    {
        $model = new FlowerSlice();
        if ($model->load(\Yii::$app->request->post())) {
            
           $model->user_id = \Yii::$app->user->id;
           $model->date_added = date('Y-m-d H:i:s');

            if ($model->save())
                return $this->redirect('/flowers/flowers-slice');
        }

        $flowers = Flowers::find()->all();
        $flowersAr = [];
        foreach ($flowers as $flower) {
            $flowersAr[$flower->id] = $flower->name_ru;
        }

        return $this->render('addFlowerSlice', ['model' => $model,'flowersAr' => $flowersAr]);
    }


}