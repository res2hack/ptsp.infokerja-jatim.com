<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ipk_kabupaten".
 *
 * @property string $id
 * @property string $nama
 * @property string $id_gen
 * @property integer $kategori
 * @property string $provinsi_id
 */
class IpkKabupaten extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ipk_kabupaten';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_gen', 'kategori', 'provinsi_id'], 'integer'],
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
            'provinsi_id' => 'Provinsi ID',
        ];
    }
}
