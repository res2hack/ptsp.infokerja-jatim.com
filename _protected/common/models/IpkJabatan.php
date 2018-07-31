<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ipk_jabatan".
 *
 * @property string $id
 * @property string $nama
 * @property string $std_id
 * @property integer $id_gen
 * @property integer $kategori
 * @property string $levels
 */
class IpkJabatan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ipk_jabatan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_gen', 'kategori'], 'integer'],
            [['nama'], 'string', 'max' => 255],
            [['std_id'], 'string', 'max' => 8],
            [['levels'], 'string', 'max' => 4]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Jabatan',
            'std_id' => 'Std ID',
            'id_gen' => 'Id Gen',
            'kategori' => 'Kategori',
            'levels' => 'Levels',
        ];
    }
}
