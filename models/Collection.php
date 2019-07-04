<?php

namespace app\models;

use Yii;
use app\models\County;

/**
 * This is the model class for table "collection".
 *
 * @property int $id_county
 * @property double $amount
 * @property double $taxrate
 */
class Collection extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'collection';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_county', 'amount', 'taxrate'], 'required'],
            [['id_county'], 'integer'],
            [['amount'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_county' => 'Id County',
            'amount' => 'Amount',
            'totalcoll' => 'Total Tax Collection',
            'avgrate' => 'Average Tax Rate',
        ];
    }

    public function getCounty()
    {
        return $this->hasOne(County::className(), ['id_county' => 'id_county']);
    }

    static function report()
    {
        $rt = ['totalcoll' => Collection::find()->sum('amount')];
        $states = State::find()->all();

        $rt['avgtaxrate'] = round(array_reduce($states,function($carry,$item)
        {
            $carry+= $item->avgtaxrate;
            return $carry;
        })/count($states),2);

        $rt['avgstatecoll'] = round($rt['totalcoll']/count($states));
        return $rt;
    }

}
