<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $trigger = "
            CREATE  TRIGGER `insert_acct_journal_voucher_item` BEFORE INSERT ON `acct_journal_voucher_item` FOR EACH ROW BEGIN
                DECLARE nAccountIDDefaultStatus		DECIMAL(1);
	
                DECLARE nAccountID		INT(10);
                declare nBranchID		int(10);
                DECLARE nOpeningBalance		DECIMAL(20,2);
                DECLARE nLastBalance		DECIMAL(20,2);
                DECLARE nTransactionType	DECIMAL(10);
                DECLARE nTransactionCode	VARCHAR(20);
                DECLARE nTransactionID		INT(10);
                DECLARE nTransactionDate	DATE;
                DECLARE nAccountIn		DECIMAL(20,2);
                DECLARE nAccountOut		DECIMAL(20,2);
                
                
                SET nBranchID 			= (SELECT branch_id FROM acct_journal_voucher
                                    WHERE journal_voucher_id = new.journal_voucher_id);
                                    
                SET nOpeningBalance 		= (SELECT last_balance FROM acct_account_balance
                                    WHERE branch_id = nBranchID
                                    AND account_id = new.account_id);
                                    
                IF ( nOpeningBalance IS NULL ) THEN
                    SET nOpeningBalance = 0;
                END IF;
                            
                SET nAccountIDDefaultStatus 	= (SELECT account_default_status FROM acct_account 
                                    WHERE account_id = new.account_id);
                                    
                IF (new.account_id_status = nAccountIDDefaultStatus) THEN
                    SET nLastBalance 	= nOpeningBalance + new.journal_voucher_amount;
                    SET nAccountIn 		= new.journal_voucher_amount;
                    SET nAccountOut		= 0;
                ELSE
                    SET nLastBalance 	= nOpeningBalance - new.journal_voucher_amount;
                    SET nAccountIn 		= 0;
                    SET nAccountOut		= new.journal_voucher_amount;
                END IF; 
                
                SET nAccountID 			= (SELECT account_id FROM acct_account_balance 
                                    WHERE branch_id = nBranchID
                                    and account_id = new.account_id);
                
                IF (nAccountID IS NULL) THEN
                    INSERT INTO acct_account_balance (branch_id, account_id, last_balance) VALUES (nBranchID, new.account_id, nLastBalance);
                ELSE 
                    UPDATE acct_account_balance SET last_balance = nLastBalance
                        WHERE account_id = new.account_id
                        and branch_id = nBranchID;
                END IF;
                
                    
                SET nTransactionType 		= (SELECT transaction_module_id FROM acct_journal_voucher WHERE journal_voucher_id = new.journal_voucher_id);
                    
                SET nTransactionCode 		= (SELECT transaction_module_code FROM acct_journal_voucher WHERE journal_voucher_id = new.journal_voucher_id);
                
                SET nTransactionID 		= new.journal_voucher_id;
                    
                SET nTransactionDate 		= (SELECT journal_voucher_date FROM acct_journal_voucher WHERE journal_voucher_id = new.journal_voucher_id);
                    
                    INSERT INTO acct_account_balance_detail (branch_id, transaction_type, transaction_code, transaction_id, transaction_date, 
                    account_id, opening_balance, account_in, account_out, last_balance)
                    VALUES (nBranchID, nTransactionType, nTransactionCode, nTransactionID, nTransactionDate, 
                        new.account_id, nOpeningBalance, nAccountIn, nAccountOut, nLastBalance);
                
                END;
        ";

        DB::unprepared($trigger);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $trigger = "
        DROP TRIGGER IF EXISTS insert_acct_journal_voucher_item;
        ";

        DB::unprepared($trigger);
    }
};