<?php

namespace common\essences;

use Yii;

/**
 * This is the model class for table "comment".
 *
 * @property int $id
 * @property string $content
 * @property int $parent_id
 * @property int $table_id
 * @property int $page_id
 * @property int $user_id
 * @property int $disabled
 *
 * @property Comment $parent
 * @property Comment[] $comments
 * @property User $user
 */
class Comment extends \yii\db\ActiveRecord
{

    public const TABLE_FILM = 1;

    public function isFilmBased()
    {
        return $this->table_id == self::TABLE_FILM;
    }

    public const TABLE_GENRE = 2;

    public function isGenreBased()
    {
        return $this->table_id = self::TABLE_GENRE;
    }

    public const TABLE_HUMAN = 3;

    public function isHumanBased()
    {
        return $this->table_id = self::TABLE_HUMAN;
    }


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content'], 'string'],
            [['parent_id', 'page_id', 'user_id'], 'integer'],
            ['table_id', 'in', 'range' => [self::TABLE_FILM]],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => Comment::className(), 'targetAttribute' => ['parent_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'content' => 'Content',
            'parent_id' => 'Parent ID',
            'table_id' => 'Table ID',
            'page_id' => 'Page ID',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(Comment::className(), ['id' => 'parent_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['parent_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
