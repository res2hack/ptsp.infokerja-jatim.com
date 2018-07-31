<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\IpkPencaker;

/**
 * IpkPencakerSearch represents the model behind the search form about `common\models\IpkPencaker`.
 */
class IpkPencakerSearch extends IpkPencaker
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'aktif', 'jenis_kelamin', 'status_nikah', 'beban_keluarga', 'kodepos', 'agama_id', 'provinsi_id', 'kabupaten_id', 'kecamatan_id', 'sts', 'jabatan_pokok', 'jabatan_kelompok', 'status'], 'integer'],
            [['bio_key', 'username', 'email', 'password', 'secret', 'regip', 'tanggal_registrasi', 'no_nik', 'nama', 'gelar_depan', 'gelar_belakang', 'tempat_lahir', 'tgl_lahir', 'wni', 'alamat_jalan', 'alamat_kota', 'telpon', 'hp', 'sim_a', 'sim_b1', 'sim_b2', 'sim_c', 'foto', 'usaha_golongan', 'tgl_hapus','status_kerja'], 'safe'],
            [['tinggi', 'berat'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = IpkPencaker::find()->orderBy('id desc');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['id'=>SORT_DESC]]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'aktif' => $this->aktif,
            'tanggal_registrasi' => $this->tanggal_registrasi,
            'tgl_lahir' => $this->tgl_lahir,
            'jenis_kelamin' => $this->jenis_kelamin,
            'status_nikah' => $this->status_nikah,
            'beban_keluarga' => $this->beban_keluarga,
            'tinggi' => $this->tinggi,
            'berat' => $this->berat,
            'kodepos' => $this->kodepos,
            'agama_id' => $this->agama_id,
            'provinsi_id' => $this->provinsi_id,
            'kabupaten_id' => $this->kabupaten_id,
            'kecamatan_id' => $this->kecamatan_id,
            'tgl_hapus' => $this->tgl_hapus,
            'sts' => $this->sts,
            'jabatan_pokok' => $this->jabatan_pokok,
            'jabatan_kelompok' => $this->jabatan_kelompok,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'bio_key', $this->bio_key])
            ->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'secret', $this->secret])
            ->andFilterWhere(['like', 'regip', $this->regip])
            ->andFilterWhere(['like', 'no_nik', $this->no_nik])
            ->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'gelar_depan', $this->gelar_depan])
            ->andFilterWhere(['like', 'gelar_belakang', $this->gelar_belakang])
            ->andFilterWhere(['like', 'tempat_lahir', $this->tempat_lahir])
            ->andFilterWhere(['like', 'wni', $this->wni])
            ->andFilterWhere(['like', 'alamat_jalan', $this->alamat_jalan])
            ->andFilterWhere(['like', 'alamat_kota', $this->alamat_kota])
            ->andFilterWhere(['like', 'telpon', $this->telpon])
            ->andFilterWhere(['like', 'hp', $this->hp])
            ->andFilterWhere(['like', 'sim_a', $this->sim_a])
            ->andFilterWhere(['like', 'sim_b1', $this->sim_b1])
            ->andFilterWhere(['like', 'sim_b2', $this->sim_b2])
            ->andFilterWhere(['like', 'sim_c', $this->sim_c])
            ->andFilterWhere(['like', 'foto', $this->foto])
            ->andFilterWhere(['like', 'usaha_golongan', $this->usaha_golongan])
            ->andFilterWhere(['like', 'status_kerja', $this->status_kerja]);

        return $dataProvider;
    }
}
