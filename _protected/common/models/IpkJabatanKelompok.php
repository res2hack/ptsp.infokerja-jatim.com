<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ipk_jabatan_kelompok".
 *
 * @property integer $id
 * @property integer $kode
 * @property string $nama
 * @property integer $ipk_jabatan_pokok_id
 */
class IpkJabatanKelompok extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ipk_jabatan_kelompok';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode', 'ipk_jabatan_pokok_id'], 'integer'],
            [['nama'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kode' => 'Kode',
            'nama' => 'Kelompok Jabatan',
            'ipk_jabatan_pokok_id' => 'Ipk Jabatan Pokok ID',
        ];
    }
}
