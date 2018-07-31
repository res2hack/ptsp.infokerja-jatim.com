<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "web_rtext".
 *
 * @property string $id
 * @property string $isi
 * @property string $tgl_mulai
 * @property string $tgl_selesai
 */
class WebInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'web_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['isi'], 'string'],
            [['tgl_mulai', 'tgl_selesai'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'isi' => 'isi',
            'tgl_mulai' => 'Tgl Mulai',
            'tgl_selesai' => 'Tgl Selesai',
        ];
    }
}
