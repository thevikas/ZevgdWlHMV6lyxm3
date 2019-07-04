<?php

namespace app\models;

use app\models\County;
use Yii;

/**
 * This is the model class for table "states".
 *
 * @property int $id_state
 * @property string $name
 */
class State extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'states';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_state' => 'Id State',
            'name' => 'Name',
            'totalcoll' => 'Total Tax Collection',
            'avgtaxrate' => 'Average Tax Rate %',
            'avgcoll' => 'Average County Tax Collection'
        ];
    }

    public function getCounties()
    {
        return $this->hasMany(County::className(), ['id_state' => 'id_state']);
    }


    public function getTotalColl()
    {
        return Collection::find()->joinWith(['county'])->where(['id_state' => $this->id_state])->sum('amount');
    }

    public function getAvgColl()
    {
        return Collection::find()->joinWith(['county'])->where(['id_state' => $this->id_state])->average('amount');
    }

    public function getAvgTaxRate()
    {
        $rt = County::find()->where(['id_state' => $this->id_state])->select('avg(taxrate) as avgtaxrate')->asArray()->one();
        return round($rt['avgtaxrate'],2);
    }

}
