<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ipk_provinsi".
 *
 * @property string $id
 * @property string $nama
 * @property string $id_gen
 * @property integer $kategori
 */
class IpkProvinsi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ipk_provinsi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_gen', 'kategori'], 'integer'],
            [['nama'], 'string', 'max' => 64]
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
            'id_gen' => 'Id Gen',
            'kategori' => 'Kategori',
        ];
    }
}
