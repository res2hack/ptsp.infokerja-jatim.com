<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pci_provinsi".
 *
 * @property integer $id
 * @property string $provinsi
 * @property integer $urutan
 *
 * @property PciKabKota[] $pciKabKotas
 */
class PciProvinsi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pci_provinsi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['provinsi'], 'required'],
            [['urutan'], 'integer'],
            [['provinsi'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'provinsi' => 'Provinsi',
            'urutan' => 'Urutan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPciKabKotas()
    {
        return $this->hasMany(PciKabKota::className(), ['provinsi_id' => 'id']);
    }
}
