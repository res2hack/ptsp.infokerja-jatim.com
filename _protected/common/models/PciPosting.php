<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pci_posting".
 *
 * @property integer $id
 * @property string $slug
 * @property string $judul
 * @property string $isi
 * @property string $ringkasan
 * @property string $gambar
 * @property string $link
 * @property string $tanggal
 * @property string $waktu_post
 * @property string $waktu_update
 * @property integer $user_id
 * @property integer $kategori_id
 * @property integer $bahasa_id
 * @property integer $sts_aktif
 *
 * @property PciKategori $kategori
 * @property PciKategori $bahasa
 * @property PciPostingTag[] $pciPostingTags
 */
class PciPosting extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pci_posting';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['judul', 'isi', 'ringkasan'], 'string'],
            [['tanggal', 'waktu_post', 'waktu_update'], 'safe'],
            [['user_id', 'kategori_id', 'bahasa_id', 'sts_aktif'], 'integer'],
            [['slug', 'gambar', 'link'], 'string', 'max' => 500],
            [['kategori_id'], 'exist', 'skipOnError' => true, 'targetClass' => PciKategori::className(), 'targetAttribute' => ['kategori_id' => 'id']],
            [['bahasa_id'], 'exist', 'skipOnError' => true, 'targetClass' => PciKategori::className(), 'targetAttribute' => ['bahasa_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'slug' => 'Slug',
            'judul' => 'Judul',
            'isi' => 'Isi',
            'ringkasan' => 'Ringkasan',
            'gambar' => 'Gambar',
            'link' => 'Link',
            'tanggal' => 'Tanggal',
            'waktu_post' => 'Waktu Post',
            'waktu_update' => 'Waktu Update',
            'user_id' => 'User ID',
            'kategori_id' => 'Kategori ID',
            'bahasa_id' => 'Bahasa ID',
            'sts_aktif' => 'Sts Aktif',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKategori()
    {
        return $this->hasOne(PciKategori::className(), ['id' => 'kategori_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBahasa()
    {
        return $this->hasOne(PciKategori::className(), ['id' => 'bahasa_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPciPostingTags()
    {
        return $this->hasMany(PciPostingTag::className(), ['posting_id' => 'id']);
    }
}
