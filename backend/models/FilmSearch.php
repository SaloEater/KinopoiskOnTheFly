<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\essences\Film;

/**
 * FilmSearch represents the model behind the search form of `common\essences\Film`.
 */
class FilmSearch extends Film
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'producer_id', 'publish_year'], 'integer'],
            [['title', 'logo', 'country', 'duration'], 'safe'],
            [['rating', 'user_rating'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Film::find();

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
            'producer_id' => $this->producer_id,
            'rating' => $this->rating,
            'publish_year' => $this->publish_year,
            'duration' => $this->duration,
            'user_rating' => $this->user_rating,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'logo', $this->logo])
            ->andFilterWhere(['like', 'country', $this->country]);

        return $dataProvider;
    }
}
