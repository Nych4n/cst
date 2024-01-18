<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        $trigger = "
        CREATE TRIGGER insert_acct_journal_voucher BEFORE INSERT ON acct_journal_voucher 
        FOR EACH ROW
        BEGIN
                DECLARE year_period 		VARCHAR(20);
                DECLARE month_period 		VARCHAR(20);
                DECLARE day_period 		VARCHAR(20);
                DECLARE period 			VARCHAR(20);
                DECLARE tPeriod			INT;
                DECLARE nJournalVoucherNo	VARCHAR(20);
                
                SET year_period = RIGHT(YEAR(new.journal_voucher_date), 2);
                
                SET month_period = RIGHT(CONCAT('0', MONTH(new.journal_voucher_date)), 2);
                
                SET day_period = RIGHT(CONCAT('0', DAY(new.journal_voucher_date)), 2);
                
                SET nJournalVoucherNo = CONCAT('JV', year_period, month_period);
                    
                SET period = (SELECT RIGHT(TRIM(journal_voucher_no), 4) 
                    FROM acct_journal_voucher
                    WHERE LEFT(TRIM(journal_voucher_no), 6) = nJournalVoucherNo
                    ORDER BY journal_voucher_id DESC 
                    LIMIT 1);
                
                IF (period IS NULL ) THEN 
                    SET period = '0000';
                END IF;
                
                SET tPeriod = CAST(period AS UNSIGNED);
                SET tPeriod = tPeriod + 1;
                SET period = RIGHT(CONCAT('000', tPeriod), 4);
                SET nJournalVoucherNo = CONCAT(nJournalVoucherNo, period);
                SET new.journal_voucher_no = nJournalVoucherNo;
        END;
        ";
    
        DB::unprepared($trigger);
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $trigger = "
            DROP TRIGGER IF EXISTS insert_acct_journal_voucher;
        ";

        DB::unprepared($trigger);
    }
};