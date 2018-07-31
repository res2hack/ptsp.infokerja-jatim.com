<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pci_kab_kota".
 *
 * @property integer $id
 * @property string $nama
 * @property integer $provinsi_id
 *
 * @property PciProvinsi $provinsi
 */
class PciKabKota extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pci_kab_kota';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama', 'provinsi_id'], 'required'],
            [['provinsi_id'], 'integer'],
            [['nama'], 'string', 'max' => 50],
            [['provinsi_id'], 'exist', 'skipOnError' => true, 'targetClass' => PciProvinsi::className(), 'targetAttribute' => ['provinsi_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'provinsi_id' => 'Provinsi ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProvinsi()
    {
        return $this->hasOne(PciProvinsi::className(), ['id' => 'provinsi_id']);
    }
}
