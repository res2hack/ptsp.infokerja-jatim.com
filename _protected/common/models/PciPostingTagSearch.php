<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\PciPostingTag;

/**
 * PciPostingTagSearch represents the model behind the search form about `common\models\PciPostingTag`.
 */
class PciPostingTagSearch extends PciPostingTag
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'kategori_id', 'posting_id'], 'integer'],
            [['waktu_post'], 'safe'],
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
        $query = PciPostingTag::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'kategori_id' => $this->kategori_id,
            'posting_id' => $this->posting_id,
            'waktu_post' => $this->waktu_post,
        ]);

        return $dataProvider;
    }
}
