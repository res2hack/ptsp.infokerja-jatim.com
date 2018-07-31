<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "email".
 *
 * @property integer $id
 * @property string $title
 * @property string $from
 * @property string $to
 * @property string $content
 * @property string $file
 * @property integer $sts
 * @property string $date_insert
 * @property integer $kat_email
 */
class Email extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'email';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['from', 'to', 'content', 'file'], 'string'],
            [['sts', 'kat_email'], 'integer'],
            [['date_insert','usia_pendaftaran'], 'safe'],
            [['title'], 'string', 'max' => 300],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'from' => 'From',
            'to' => 'To',
            'content' => 'Content',
            'file' => 'File',
            'sts' => 'Sts',
            'date_insert' => 'Date Insert',
            'kat_email' => 'Kat Email',
        ];
    }
}
