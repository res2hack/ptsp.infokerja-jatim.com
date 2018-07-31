<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pci_konsultasi".
 *
 * @property integer $id
 * @property string $pertanyaan
 * @property string $nama
 * @property string $alamat
 * @property string $telp
 * @property string $email
 * @property string $jawaban
 * @property string $petugas
 * @property integer $kategori_id
 *
 * @property PciKategori $kategori
 */
class PciKonsultasi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
		 public $reCaptcha;
    public static function tableName()
    {
        return 'pci_konsultasi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pertanyaan', 'jawaban'], 'string', ],
            [['kategori_id'], 'integer'],
            [['nama', 'alamat', 'telp', 'email','pertanyaan'], 'required'],
            [['nama', 'alamat', 'telp', 'email', 'petugas'], 'string', 'max' => 100],
            [['kategori_id'], 'exist', 'skipOnError' => true, 'targetClass' => PciKategori::className(), 'targetAttribute' => ['kategori_id' => 'id']],
            [['reCaptcha'], 'captcha'],
			// [['reCaptcha'], \himiklab\yii2\recaptcha\ReCaptchaValidator::className(), 'secret' => '6LfTahIUAAAAAJ5NuztuU_4taxknAI4f4ITL38el', 'uncheckedMessage' => 'Please confirm that you are not a bot.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pertanyaan' => 'Pertanyaan',
            'nama' => 'Nama',
            'alamat' => 'Alamat',
            'telp' => 'Telp',
            'email' => 'Email',
            'jawaban' => 'Jawaban',
            'petugas' => 'Petugas',
            'kategori_id' => 'Kategori ID',
            'reCaptcha' => 'Ketik Ulang Tulisan Berikut ini',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKategori()
    {
        return $this->hasOne(PciKategori::className(), ['id' => 'kategori_id']);
    }
}
