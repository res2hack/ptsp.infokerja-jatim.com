<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ipk_jabatan_pokok".
 *
 * @property integer $id
 * @property integer $kode
 * @property string $nama
 */
class IpkJabatanPokok extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ipk_jabatan_pokok';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode'], 'integer'],
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
            'nama' => 'Jabatan',
        ];
    }
}
