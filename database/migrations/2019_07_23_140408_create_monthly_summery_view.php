<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateMonthlySummeryView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement($this->dropView());

        DB::statement($this->createView());
    }

    private function dropView(): string
    {
        return <<<SQL
            DROP VIEW IF EXISTS `jnn_monthly_summery_view`;
SQL;
    }

    private function createView(): string
    {
        return <<<SQL
            CREATE VIEW `jnn_monthly_summery_view` AS
            
            select `m`.`user_id`                                                                                                AS `user_id`,
       year(`m`.`date`)                                                                                             AS `year`,
       month(`m`.`date`)                                                                                            AS `month`,
       sum(`m`.`total`)                                                                                             AS `meal`,
       (select count(distinct `mm`.`user_id`)
        from `jnn_meals` `mm`
        where ((year(`m`.`date`) = year(`mm`.`date`)) and (month(`m`.`date`) = month(`mm`.`date`)) and
               isnull(`mm`.`deleted_at`)))                                                                          AS `member`,
       (select ifnull(sum(`mm`.`total`), 0)
        from `jnn_meals` `mm`
        where ((year(`m`.`date`) = year(`mm`.`date`)) and (month(`m`.`date`) = month(`mm`.`date`)) and
               isnull(`mm`.`deleted_at`)))                                                                          AS `total_meal`,
       (select ifnull(sum(`c`.`amount`), 0)
        from `jnn_collections` `c`
        where ((`c`.`user_id` = `m`.`user_id`) and (year(`m`.`date`) = year(`c`.`date`)) and
               (month(`m`.`date`) = month(`c`.`date`)) and
               isnull(`c`.`deleted_at`)))                                                                           AS `collection`,
       (select ifnull(sum(`c`.`amount`), 0)
        from `jnn_collections` `c`
        where ((year(`m`.`date`) = year(`c`.`date`)) and (month(`m`.`date`) = month(`c`.`date`)) and
               isnull(`c`.`deleted_at`)))                                                                           AS `total_collection`,
       (select ifnull(sum(`e`.`amount`), 0)
        from `jnn_expenses` `e`
        where ((year(`m`.`date`) = year(`e`.`date`)) and (month(`m`.`date`) = month(`e`.`date`)) and
               (`e`.`type` = 'R') and
               isnull(`e`.`deleted_at`)))                                                                           AS `total_expense`,
       (select ifnull(sum(`e`.`amount`), 0)
        from `jnn_expenses` `e`
        where ((year(`m`.`date`) = year(`e`.`date`)) and (month(`m`.`date`) = month(`e`.`date`)) and
               (`e`.`type` = 'O') and
               isnull(`e`.`deleted_at`)))                                                                           AS `total_others_expanse`,
       ((select ifnull(sum(`e`.`amount`), 0)
         from `jnn_expenses` `e`
         where ((year(`m`.`date`) = year(`e`.`date`)) and (month(`m`.`date`) = month(`e`.`date`)) and
                (`e`.`type` = 'R') and isnull(`e`.`deleted_at`))) / (select ifnull(sum(`mm`.`total`), 0)
                                                                     from `jnn_meals` `mm`
                                                                     where ((year(`m`.`date`) = year(`mm`.`date`)) and
                                                                            (month(`m`.`date`) = month(`mm`.`date`)) and
                                                                            isnull(`mm`.`deleted_at`))))            AS `meal_rate`,
       (((select ifnull(sum(`e`.`amount`), 0)
          from `jnn_expenses` `e`
          where ((year(`m`.`date`) = year(`e`.`date`)) and (month(`m`.`date`) = month(`e`.`date`)) and
                 (`e`.`type` = 'R') and isnull(`e`.`deleted_at`))) / (select ifnull(sum(`mm`.`total`), 0)
                                                                      from `jnn_meals` `mm`
                                                                      where ((year(`m`.`date`) = year(`mm`.`date`)) and
                                                                             (month(`m`.`date`) = month(`mm`.`date`)) and
                                                                             isnull(`mm`.`deleted_at`)))) *
        sum(`m`.`total`))                                                                                           AS `meal_cost`,
       ((select ifnull(sum(`e`.`amount`), 0)
         from `jnn_expenses` `e`
         where ((year(`m`.`date`) = year(`e`.`date`)) and (month(`m`.`date`) = month(`e`.`date`)) and
                (`e`.`type` = 'O') and isnull(`e`.`deleted_at`))) / (select count(distinct `mm`.`user_id`)
                                                                     from `jnn_meals` `mm`
                                                                     where ((year(`m`.`date`) = year(`mm`.`date`)) and
                                                                            (month(`m`.`date`) = month(`mm`.`date`)) and
                                                                            isnull(`mm`.`deleted_at`))))            AS `others_cost`,
       ceiling(((((select ifnull(sum(`e`.`amount`), 0)
                   from `jnn_expenses` `e`
                   where ((year(`m`.`date`) = year(`e`.`date`)) and (month(`m`.`date`) = month(`e`.`date`)) and
                          (`e`.`type` = 'R') and isnull(`e`.`deleted_at`))) / (select ifnull(sum(`mm`.`total`), 0)
                                                                               from `jnn_meals` `mm`
                                                                               where ((year(`m`.`date`) = year(`mm`.`date`)) and
                                                                                      (month(`m`.`date`) = month(`mm`.`date`)) and
                                                                                      isnull(`mm`.`deleted_at`)))) *
                 sum(`m`.`total`)) + ((select ifnull(sum(`e`.`amount`), 0)
                                       from `jnn_expenses` `e`
                                       where ((year(`m`.`date`) = year(`e`.`date`)) and
                                              (month(`m`.`date`) = month(`e`.`date`)) and (`e`.`type` = 'O') and
                                              isnull(`e`.`deleted_at`))) / (select count(distinct `mm`.`user_id`)
                                                                            from `jnn_meals` `mm`
                                                                            where ((year(`m`.`date`) = year(`mm`.`date`)) and
                                                                                   (month(`m`.`date`) = month(`mm`.`date`)) and
                                                                                   isnull(`mm`.`deleted_at`))))))   AS `total_cost`,
       (ceiling((select ifnull(sum(`c`.`amount`), 0)
                 from `jnn_collections` `c`
                 where ((`c`.`user_id` = `m`.`user_id`) and (year(`m`.`date`) = year(`c`.`date`)) and
                        (month(`m`.`date`) = month(`c`.`date`)) and isnull(`c`.`deleted_at`)))) -
        ceiling(((((select ifnull(sum(`e`.`amount`), 0)
                    from `jnn_expenses` `e`
                    where ((year(`m`.`date`) = year(`e`.`date`)) and (month(`m`.`date`) = month(`e`.`date`)) and
                           (`e`.`type` = 'R') and isnull(`e`.`deleted_at`))) / (select ifnull(sum(`mm`.`total`), 0)
                                                                                from `jnn_meals` `mm`
                                                                                where ((year(`m`.`date`) = year(`mm`.`date`)) and
                                                                                       (month(`m`.`date`) = month(`mm`.`date`)) and
                                                                                       isnull(`mm`.`deleted_at`)))) *
                  sum(`m`.`total`)) + ((select ifnull(sum(`e`.`amount`), 0)
                                        from `jnn_expenses` `e`
                                        where ((year(`m`.`date`) = year(`e`.`date`)) and
                                               (month(`m`.`date`) = month(`e`.`date`)) and (`e`.`type` = 'O') and
                                               isnull(`e`.`deleted_at`))) / (select count(distinct `mm`.`user_id`)
                                                                             from `jnn_meals` `mm`
                                                                             where ((year(`m`.`date`) = year(`mm`.`date`)) and
                                                                                    (month(`m`.`date`) = month(`mm`.`date`)) and
                                                                                    isnull(`mm`.`deleted_at`))))))) AS `amount_left`
from `jnn_meals` `m`
where deleted_at is null
group by year(`m`.`date`), month(`m`.`date`), `m`.`user_id`;
SQL;
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement($this->dropView());
    }
}
