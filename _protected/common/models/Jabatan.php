<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "jabatan".
 *
 * @property integer $id
 * @property string $nama
 * @property string $kode_jabatan
 *
 * @property Sip[] $sips
 */
class Jabatan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jabatan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama'], 'required'],
            [['nama', 'kode_jabatan'], 'string', 'max' => 100],
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
            'kode_jabatan' => 'Kode Jabatan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSips()
    {
        return $this->hasMany(Sip::className(), ['jabatan_id' => 'id']);
    }
}
