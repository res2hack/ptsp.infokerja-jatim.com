<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ipk_pencaker".
 *
 * @property string $id
 * @property string $bio_key
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $secret
 * @property integer $aktif
 * @property string $regip
 * @property string $tanggal_registrasi
 * @property string $no_nik
 * @property string $nama
 * @property string $gelar_depan
 * @property string $gelar_belakang
 * @property string $tempat_lahir
 * @property string $tgl_lahir
 * @property integer $jenis_kelamin
 * @property integer $status_nikah
 * @property integer $beban_keluarga
 * @property string $wni
 * @property double $tinggi
 * @property double $berat
 * @property string $alamat_jalan
 * @property string $alamat_kota
 * @property string $kodepos
 * @property string $telpon
 * @property string $hp
 * @property string $agama_id
 * @property string $provinsi_id
 * @property string $kabupaten_id
 * @property string $kecamatan_id
 * @property string $sim_a
 * @property string $sim_b1
 * @property string $sim_b2
 * @property string $sim_c
 * @property string $foto
 * @property string $usaha_golongan
 * @property string $tgl_hapus
 * @property integer $sts
 * @property integer $jabatan_pokok
 * @property integer $jabatan_kelompok
 * @property integer $status
 * @property integer $status_kerja
 * @property integer $curiculum_viteae
 * @property integer $lampiran
* @property integer $sts_kompetensi
* @property integer $sts_sehat
* @property string $no_bpjs
* @property integer $sts_dokumen
 */
class IpkPencaker extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $reCaptcha;
    // public $verifyCode;
    public static function tableName()
    {
        return 'ipk_pencaker';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['aktif', 'jenis_kelamin', 'status_nikah', 'beban_keluarga', 'kodepos', 'agama_id', 'provinsi_id', 'kabupaten_id', 'kecamatan_id', 'sts', 'jabatan_pokok', 'jabatan_kelompok', 'status', 'pddk_tingkat', 'pddk_jenis', 'pddk_jurusan','email_status','minat_pelajaran','prov_tinggal', 'kab_tinggal', 'kec_tinggal','minat_negara','sts_kompetensi', 'sts_sehat', 'sts_dokumen'], 'integer'],
            [['tanggal_registrasi', 'tgl_lahir', 'tgl_hapus', 'tgl_login', 'tgl_update', 'tgl_keluar'], 'safe'],
            [['tinggi', 'berat'], 'number'],
            [['bio_key', 'username', 'password', 'nama','hobi'], 'string', 'max' => 64],
            [['email','no_nik'], 'unique'],
            [['email'], 'email'],
            [['email','jenis_kelamin','kabupaten_id', 'kecamatan_id','tgl_lahir','password','nama','pddk_tingkat','agama_id','no_nik'], 'required'],
            [['email',], 'string', 'max' => 255],
            [['secret'], 'string', 'max' => 100],
            [['regip', 'alamat_kota', 'telpon', 'hp','status_kerja','minat_jabatan'], 'string', 'max' => 20],
            [['no_nik', 'tempat_lahir'], 'string', 'max' => 32],
            [['gelar_depan', 'gelar_belakang'], 'string', 'max' => 10],
            [['wni'], 'string', 'max' => 2],
            [['alamat_jalan','alamat_tinggal','minat_lokasi_kerja','minat_kab_kerja','alasan_keluar','remark1','remark2','remark3','remark4','remark5', 'foto','pddk_lainnya'], 'string', 'max' => 128],
            [['sim_a', 'sim_b1', 'sim_b2', 'sim_c'], 'string', 'max' => 1],
            [['usaha_golongan'], 'string', 'max' => 4],
            [['curiculum_viteae','lampiran'], 'string', 'max' => 500],
			[['no_bpjs'], 'string', 'max' => 50],
            [['reCaptcha'],'captcha'],
						// 'captcha' => [
                // 'class' => '\hr\captcha\CaptchaAction',
                // 'operators' => ['+','-','*'],
                // 'maxValue' => 10,
                // 'fontSize' => 18,
            // ],
						
            // [['reCaptcha'], \himiklab\yii2\recaptcha\ReCaptchaValidator::className(), 'secret' => '6LfTahIUAAAAAJ5NuztuU_4taxknAI4f4ITL38el','on' => 'create']
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'bio_key' => 'Bio Key',
            'username' => 'Username',
            'email' => 'Email',
            'password' => 'Password',
            'secret' => 'Secret',
            'aktif' => 'Aktif',
            'regip' => 'Regip',
            'tanggal_registrasi' => 'Tanggal Registrasi',
            'no_nik' => 'No Nik / No KTP',
            'nama' => 'Nama',
            'gelar_depan' => 'Gelar Depan',
            'gelar_belakang' => 'Gelar Belakang',
            'tempat_lahir' => 'Tempat Lahir',
            'tgl_lahir' => 'Tgl Lahir',
            'jenis_kelamin' => 'Jenis Kelamin',
            'status_nikah' => 'Status Nikah',
            'beban_keluarga' => 'Beban Keluarga',
            'wni' => 'Wni',
            'tinggi' => 'Tinggi',
            'berat' => 'Berat',
            'alamat_jalan' => 'Alamat Jalan',
            'alamat_kota' => 'Alamat Kota',
            'kodepos' => 'Kodepos',
            'telpon' => 'Telpon',
            'hp' => 'Hp',
            'agama_id' => 'Agama ID',
            'provinsi_id' => 'Provinsi (Alamat)',
            'kabupaten_id' => 'Kabupaten (Alamat)',
            'kecamatan_id' => 'Kecamatan (Alamat)',
            'sim_a' => 'Sim A',
            'sim_b1' => 'Sim B1',
            'sim_b2' => 'Sim B2',
            'sim_c' => 'Sim C',
            'foto' => 'Foto',
            'usaha_golongan' => 'Usaha Golongan',
            'tgl_hapus' => 'Tgl Hapus',
            'sts' => 'Sts',
            'jabatan_pokok' => 'Jabatan Pokok',
            'jabatan_kelompok' => 'Jabatan Kelompok',
            'status' => 'Status',
            'status_kerja' => 'Status Kerja',
            'curiculum_viteae' => 'Curriculum Vitteae / Daftar Riwayat Hidup',
            'lampiran' => 'Lampiran Lainnya',
            'pddk_tingkat' => 'Pendidikan Terakhir',
            'pddk_jenis' => 'Pendidikan Jurusan',
            'pddk_jurusan' => 'Pendidikan SubJurusan',            
            'email_status' => 'email status',
            'alamat_tinggal' => 'Alamat Tinggal',
            'prov_tinggal' => 'Provinsi Tinggal',
            'kab_tinggal' => 'Kabupaten Tinggal',
            'kec_tinggal' => 'Kecamatan Tinggal',
            'minat_lokasi_kerja' => 'Minat Lokasi Kerja',
            'minat_kab_kerja' => 'Minat Kerja (Kabupaten)',
            'minat_pelajaran' => 'Minat Pelajaran',
            'hobi' => 'Hobi',
            'minat_jabatan' => 'Jabatan yang Diminati',
            'minat_negara' => 'negara yang Diminati',
            'tgl_login' => 'Tanggal Login',
            'tgl_update' => 'Tanggal Update',
            'pddk_lainnya' => 'Tanggal Keluar',
            'pddk_lainnya' => 'Jurusan',
            'reCaptcha' => 'Ketik Ulang Tulisan Berikut',
           'sts_kompetensi' => 'Apakah Anda Memiliki Kompetensi yang sesuai ?',
           'sts_sehat' => 'Apakah Anda Sehat Jasmani dan Rohani?',
           'no_bpjs' => 'Nomor BPJS Ketenagakerjaan',
           'sts_dokumen' => 'Apakah Anda Memiliki Dokumen Sesuai Persyaratan ?',
        ];
    }
    public function getIpkPendidikans()
    {
        return $this->hasMany(IpkPendidikan::className(), ['pencaker_id' => 'id']);
    }
    public function getAgama()
    {
        return $this->hasOne(IpkAgama::className(), ['id' => 'agama_id']);
    }
    public function getProvinsi()
    {
        return $this->hasOne(IpkProvinsi::className(), ['id' => 'provinsi_id']);
    }
    public function getKabupaten()
    {
        return $this->hasOne(IpkKabupaten::className(), ['id' => 'kabupaten_id']);
    }
    public function getKecamatan()
    {
        return $this->hasOne(IpkKecamatan::className(), ['id' => 'kecamatan_id']);
    }

}
