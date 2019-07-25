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
 *
 * @property Comment $parent
 * @property Comment[] $comments
 * @property User $user
 */
class Comment extends \yii\db\ActiveRecord
{
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
            [['parent_id', 'table_id', 'page_id', 'user_id'], 'integer'],
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
