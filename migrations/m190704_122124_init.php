<?php

use yii\db\Migration;

/**
 * Class m190704_122124_init
 */
class m190704_122124_init extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("

            SET AUTOCOMMIT = 0;
            START TRANSACTION;

            CREATE TABLE `collection` (
            `id_coll` int(11) NOT NULL,
            `id_county` int(11) NOT NULL,
            `amount` double NOT NULL
            ) ENGINE=MyISAM DEFAULT CHARSET=utf8;

            CREATE TABLE `county` (
            `id_county` int(11) NOT NULL,
            `name` varchar(255) NOT NULL,
            `id_state` int(11) NOT NULL,
            `taxrate` float NOT NULL
            ) ENGINE=MyISAM DEFAULT CHARSET=utf8;

            CREATE TABLE `states` (
            `id_state` int(11) NOT NULL,
            `name` varchar(255) NOT NULL
            ) ENGINE=MyISAM DEFAULT CHARSET=utf8;

            ALTER TABLE `collection`
            ADD PRIMARY KEY (`id_coll`),
            ADD KEY `id_county` (`id_county`),
            ADD KEY `id_county_2` (`id_county`);

            ALTER TABLE `county`
            ADD PRIMARY KEY (`id_county`),
            ADD KEY `id_state` (`id_state`),
            ADD KEY `id_state_2` (`id_state`);

            ALTER TABLE `states`
            ADD PRIMARY KEY (`id_state`);

            ALTER TABLE `collection`
            MODIFY `id_coll` int(11) NOT NULL AUTO_INCREMENT;

            ALTER TABLE `county`
            MODIFY `id_county` int(11) NOT NULL AUTO_INCREMENT;

            ALTER TABLE `states`
            MODIFY `id_state` int(11) NOT NULL AUTO_INCREMENT;
            COMMIT;
    ");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190704_122124_init cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190704_122124_init cannot be reverted.\n";

        return false;
    }
    */
}
