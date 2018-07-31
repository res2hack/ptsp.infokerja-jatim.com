<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "perusahaan".
 *
 * @property integer $id
 * @property string $nama
 * @property string $alamat
 * @property string $contact_nama
 * @property string $contact_telp
 * @property string $profil
 *
 * @property Sip[] $sips
 */
class Perusahaan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'perusahaan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama'], 'required'],
            [['provinsi_id', 'kabkota_id', 'kecamatan_id'], 'integer'],
            [['nama', 'contact_nama', 'contact_telp','email'], 'string', 'max' => 100],
            [['alamat'], 'string', 'max' => 500],
            [['profil'], 'string'],
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
            'alamat' => 'Alamat',
            'contact_nama' => 'Kontak Nama',
            'contact_telp' => 'Kontak Telp',
            'profil' => 'Profil Perusahaan',
            'email' => 'Email',
            'provinsi_id' => 'Provinsi (Alamat)',
            'kabkota_id' => 'Kabupaten / Kota (Alamat)',
            'kecamatan_id' => 'Kecamatan (Alamat)',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSips()
    {
        return $this->hasMany(Sip::className(), ['perusahaan_id' => 'id']);
    }
}
