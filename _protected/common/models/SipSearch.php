<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Sip;

/**
 * SipSearch represents the model behind the search form about `common\models\Sip`.
 */
class SipSearch extends Sip
{
    /**
     * @inheritdoc
     */
		public $nama_perusahaan;
    public function rules()
    {
        return [
            [['id', 'perusahaan_id', 'sts_formal', 'jabatan_id', 'negara_tujuan', 'jumlah_l', 'jumlah_p', 'jumlah_lp'], 'integer'],
            [['no_sip', 'agency', 'tgl_ijin_awal', 'tgl_ijin_akhir', 'tgl_input', 'tgl_update','nama_perusahaan'], 'safe'],
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
        $query = Sip::find();
				$query->joinWith(['perusahaan']);
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
				$dataProvider->sort->attributes['nama_perusahaan'] = [
					// The tables are the ones our relation are configured to
					// in my case they are prefixed with "tbl_"
					'asc' => ['perusahaan.nama' => SORT_ASC],
					'desc' => ['perusahaan.nama' => SORT_DESC],
				];
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'perusahaan_id' => $this->perusahaan_id,
            'sts_formal' => $this->sts_formal,
            'jabatan_id' => $this->jabatan_id,
            'negara_tujuan' => $this->negara_tujuan,
            'tgl_ijin_awal' => $this->tgl_ijin_awal,
            'tgl_ijin_akhir' => $this->tgl_ijin_akhir,
            'jumlah_l' => $this->jumlah_l,
            'jumlah_p' => $this->jumlah_p,
            'jumlah_lp' => $this->jumlah_lp,
            'tgl_input' => $this->tgl_input,
            'tgl_update' => $this->tgl_update,
        ]);

        $query->andFilterWhere(['like', 'no_sip', $this->no_sip])
            ->andFilterWhere(['like', 'agency', $this->agency])
						->andFilterWhere(['like', 'perusahaan.nama', $this->nama_perusahaan]);

        return $dataProvider;
    }
}
