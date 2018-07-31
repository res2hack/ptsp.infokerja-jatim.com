<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "negara_tujuan".
 *
 * @property integer $id
 * @property string $negara
 *
 * @property Sip[] $sips
 */
class NegaraTujuan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'negara_tujuan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['negara'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'negara' => 'Negara',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSips()
    {
        return $this->hasMany(Sip::className(), ['negara_tujuan' => 'id']);
    }
}
