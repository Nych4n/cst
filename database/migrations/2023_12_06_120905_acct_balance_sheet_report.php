<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if(!Schema::hasTable('acct_balance_sheet_report')) {
            Schema::create('acct_balance_sheet_report', function (Blueprint $table) {
                $table->id('balance_sheet_report_id');
                $table->integer('report_no')->nullable();
                $table->unsignedBigInteger('account_id1')->nullable();
                $table->foreign('account_id1')->references('account_id')->on('acct_account')->onUpdate('cascade')->onDelete('set null');
                $table->string('account_code1')->nullable();
                $table->string('account_name1')->nullable();
                $table->unsignedBigInteger('account_id2')->nullable();
                $table->foreign('account_id2')->references('account_id')->on('acct_account')->onUpdate('cascade')->onDelete('set null');
                $table->string('account_code2')->nullable();
                $table->string('account_name2')->nullable();

                $table->string('report_formula1')->nullable();
                $table->string('report_operator1')->nullable();
                $table->integer('report_type1')->nullable();
                $table->integer('report_tab1')->nullable();
                $table->integer('report_bold1')->nullable();
                $table->string('report_formula2')->nullable();
                $table->string('report_operator2')->nullable();
                $table->integer('report_type2')->nullable();
                $table->integer('report_tab2')->nullable();
                $table->integer('report_bold2')->nullable();

                $table->integer('balance_report_type')->nullable();
                $table->integer('balance_report_type1')->nullable();

                $table->unsignedBigInteger('created_id')->nullable();
                $table->unsignedBigInteger('updated_id')->nullable();
                $table->unsignedBigInteger('deleted_id')->nullable();
                $table->timestamps();
                $table->softDeletesTz();
            });
            DB::table('acct_balance_sheet_report')->insert([
                [ 'report_no' => 1, 'account_id1'=>null,    'account_code1' => null,        'account_name1' => 'AKTIVA',                    'account_id2'=>null,    'account_code2'=>null,      'account_name2'=>'PASIVA' ,                         'report_type1'=>1,'report_tab1'=>0 ,'report_bold1'=>1,   'report_type2'=>1,'report_tab2'=>0 ,'report_bold2'=>1,  'balance_report_type'=>0,'balance_report_type1'=>0],
                [ 'report_no' => 2, 'account_id1'=>2,       'account_code1' => "101.00",    'account_name1' => 'ASET LANCAR',               'account_id2'=>21,      'account_code2'=>"201.00",  'account_name2'=>'KEWAJIBAN LANCAR' ,               'report_type1'=>1,'report_tab1'=>0 ,'report_bold1'=>1,   'report_type2'=>1,'report_tab2'=>0 ,'report_bold2'=>1,  'balance_report_type'=>0,'balance_report_type1'=>0],
                [ 'report_no' => 3, 'account_id1'=>3,       'account_code1' => "101.01",    'account_name1' => 'Kas Besar',                 'account_id2'=>22,      'account_code2'=>"201.01",  'account_name2'=>'Utang Dagang' ,                   'report_type1'=>2,'report_tab1'=>0 ,'report_bold1'=>0,   'report_type2'=>2,'report_tab2'=>0 ,'report_bold2'=>0,  'balance_report_type'=>0,'balance_report_type1'=>0],
                [ 'report_no' => 4, 'account_id1'=>null,    'account_code1' => null,        'account_name1' => null,                        'account_id2'=>25,      'account_code2'=>"201.04",  'account_name2'=>'Utang Gaji' ,                     'report_type1'=>2,'report_tab1'=>0 ,'report_bold1'=>0,   'report_type2'=>2,'report_tab2'=>0 ,'report_bold2'=>0,  'balance_report_type'=>0,'balance_report_type1'=>0],
                [ 'report_no' => 5, 'account_id1'=>4,       'account_code1' => "101.02",    'account_name1' => 'Kas Di Bank',               'account_id2'=>23,      'account_code2'=>"201.02",  'account_name2'=>'Utang Pajak' ,                    'report_type1'=>1,'report_tab1'=>0 ,'report_bold1'=>1,   'report_type2'=>2,'report_tab2'=>0 ,'report_bold2'=>0,  'balance_report_type'=>0,'balance_report_type1'=>0],
                [ 'report_no' => 6, 'account_id1'=>5,       'account_code1' => "101.02.1",  'account_name1' => 'Kas Di Bank MANDIRI',       'account_id2'=>24,      'account_code2'=>"201.01",  'account_name2'=>'Utang Dagang' ,                   'report_type1'=>2,'report_tab1'=>0 ,'report_bold1'=>0,   'report_type2'=>2,'report_tab2'=>0 ,'report_bold2'=>0,  'balance_report_type'=>0,'balance_report_type1'=>0],
                [ 'report_no' => 7, 'account_id1'=>6,       'account_code1' => "101.02.2",  'account_name1' => 'Kas Di BNI',                'account_id2'=>null,    'account_code2'=>null,      'account_name2'=>null,                              'report_type1'=>2,'report_tab1'=>0 ,'report_bold1'=>0,   'report_type2'=>0,'report_tab2'=>0 ,'report_bold2'=>0,  'balance_report_type'=>0,'balance_report_type1'=>0],
                [ 'report_no' => 8, 'account_id1'=>7,       'account_code1' => "101.02.3",  'account_name1' => 'Kas Di BRI',                'account_id2'=>21,      'account_code2'=>"201.00",  'account_name2'=>'KEWAJIBAN LANCAR' ,               'report_type1'=>2,'report_tab1'=>0 ,'report_bold1'=>0,   'report_type2'=>1,'report_tab2'=>0 ,'report_bold2'=>1,  'balance_report_type'=>0,'balance_report_type1'=>0],
                [ 'report_no' => 9, 'account_id1'=>null,    'account_code1' => null,        'account_name1' => null,                        'account_id2'=>null,    'account_code2'=>null,      'account_name2'=>null ,                             'report_type1'=>2,'report_tab1'=>0 ,'report_bold1'=>0,   'report_type2'=>2,'report_tab2'=>0 ,'report_bold2'=>1,  'balance_report_type'=>0,'balance_report_type1'=>0],
                [ 'report_no' => 10, 'account_id1'=>8,      'account_code1' => "101.03",    'account_name1' => 'Piutang',                   'account_id2'=>null,    'account_code2'=>null,      'account_name2'=>null,                              'report_type1'=>2,'report_tab1'=>0 ,'report_bold1'=>0,   'report_type2'=>0,'report_tab2'=>0 ,'report_bold2'=>0,  'balance_report_type'=>0,'balance_report_type1'=>0],
                [ 'report_no' => 11, 'account_id1'=>9,      'account_code1' => "101.03.1",  'account_name1' => 'Piutang Aplikasi',          'account_id2'=>null,    'account_code2'=>null,      'account_name2'=>'** KEWAJIBAN JANGKA PANJANG **',  'report_type1'=>2,'report_tab1'=>0 ,'report_bold1'=>0,   'report_type2'=>1,'report_tab2'=>0 ,'report_bold2'=>1,  'balance_report_type'=>0,'balance_report_type1'=>0],
                [ 'report_no' => 12, 'account_id1'=>10,     'account_code1' => "101.03.2",  'account_name1' => 'Piutang Hardware',          'account_id2'=>26,      'account_code2'=>"201.01.1",'account_name2'=>'Hutang Pihak Ke Tiga' ,           'report_type1'=>2,'report_tab1'=>0 ,'report_bold1'=>0,   'report_type2'=>2,'report_tab2'=>0 ,'report_bold2'=>0,  'balance_report_type'=>0,'balance_report_type1'=>0],
                [ 'report_no' => 13, 'account_id1'=>11,     'account_code1' => "101.03.3",  'account_name1' => 'Piutang Divisi Multimedia', 'account_id2'=>27,      'account_code2'=>"201.01.2",'account_name2'=>'Hutang Di Bank' ,                 'report_type1'=>2,'report_tab1'=>0 ,'report_bold1'=>0,   'report_type2'=>2,'report_tab2'=>0 ,'report_bold2'=>0,  'balance_report_type'=>0,'balance_report_type1'=>0],
                [ 'report_no' => 14, 'account_id1'=>null,   'account_code1' => null,        'account_name1' => null,                        'account_id2'=>null,    'account_code2'=>null,      'account_name2'=>null ,                             'report_type1'=>2,'report_tab1'=>0 ,'report_bold1'=>0,   'report_type2'=>2,'report_tab2'=>0 ,'report_bold2'=>1,  'balance_report_type'=>0,'balance_report_type1'=>0],
                [ 'report_no' => 15, 'account_id1'=>13,     'account_code1' => "101.03.5",  'account_name1' => 'Piutang Lain-lain',         'account_id2'=>28,      'account_code2'=>"201.05",  'account_name2'=>'KEWAJIBAN JANGKA PANJANG' ,       'report_type1'=>2,'report_tab1'=>0 ,'report_bold1'=>0,   'report_type2'=>1,'report_tab2'=>0 ,'report_bold2'=>1,  'balance_report_type'=>0,'balance_report_type1'=>0],
                [ 'report_no' => 16, 'account_id1'=>null,   'account_code1' => null,        'account_name1' => null,                        'account_id2'=>null,    'account_code2'=>null,      'account_name2'=>null ,                             'report_type1'=>2,'report_tab1'=>0 ,'report_bold1'=>0,   'report_type2'=>2,'report_tab2'=>0 ,'report_bold2'=>1,  'balance_report_type'=>0,'balance_report_type1'=>0],
                [ 'report_no' => 17, 'account_id1'=>null,   'account_code1' => null,        'account_name1' => null,                        'account_id2'=>null,    'account_code2'=>null,      'account_name2'=>null ,                             'report_type1'=>2,'report_tab1'=>0 ,'report_bold1'=>0,   'report_type2'=>2,'report_tab2'=>0 ,'report_bold2'=>1,  'balance_report_type'=>0,'balance_report_type1'=>0],
                [ 'report_no' => 18, 'account_id1'=>2,      'account_code1' => "101.00",    'account_name1' => 'AKTIVA LANCAR',             'account_id2'=>null,    'account_code2'=>"",        'account_name2'=>'TOTAL KEWAJIBAN',                 'report_type1'=>1,'report_tab1'=>0 ,'report_bold1'=>1,   'report_type2'=>1,'report_tab2'=>0 ,'report_bold2'=>1,  'balance_report_type'=>0,'balance_report_type1'=>0],
                [ 'report_no' => 19, 'account_id1'=>null,   'account_code1' => null,        'account_name1' => null,                        'account_id2'=>null,    'account_code2'=>null,      'account_name2'=>null ,                             'report_type1'=>1,'report_tab1'=>0 ,'report_bold1'=>0,   'report_type2'=>2,'report_tab2'=>0 ,'report_bold2'=>1, 'balance_report_type'=>0,'balance_report_type1'=>0],
                [ 'report_no' => 20, 'account_id1'=>14,     'account_code1' => "102.00",    'account_name1' => 'AKTIVA TETAP',              'account_id2'=>null,    'account_code2'=>null,      'account_name2'=>null,                              'report_type1'=>1,'report_tab1'=>0 ,'report_bold1'=>1,   'report_type2'=>1,'report_tab2'=>0 ,'report_bold2'=>0, 'balance_report_type'=>0,'balance_report_type1'=>0],
                [ 'report_no' => 21, 'account_id1'=>null,   'account_code1' => null,        'account_name1' =>"Biaya Pra Operasional",      'account_id2'=>null,    'account_code2'=>null,      'account_name2'=>'** EKUITAS **' ,                  'report_type1'=>2,'report_tab1'=>0 ,'report_bold1'=>0,   'report_type2'=>1,'report_tab2'=>0 ,'report_bold2'=>1,  'balance_report_type'=>0,'balance_report_type1'=>0],
                [ 'report_no' => 22, 'account_id1'=>15,     'account_code1' => "102.01",    'account_name1' => 'Inventaris Hardware',       'account_id2'=>29,      'account_code2'=>"202.00",  'account_name2'=>'MODAL/EKUITAS' ,                  'report_type1'=>2,'report_tab1'=>0 ,'report_bold1'=>0,   'report_type2'=>1,'report_tab2'=>0,'report_bold2'=>1,  'balance_report_type'=>0,'balance_report_type1'=>0],
                [ 'report_no' => 23, 'account_id1'=>16,     'account_code1' => "102.02",    'account_name1' => 'Inventaris Kantor/Pameran', 'account_id2'=>20,      'account_code2'=>"202.01",  'account_name2'=>'L/R Tahun Berjalan' ,             'report_type1'=>2,'report_tab1'=>0 ,'report_bold1'=>0,   'report_type2'=>2,'report_tab2'=>0 ,'report_bold2'=>0,  'balance_report_type'=>0,'balance_report_type1'=>0],
                [ 'report_no' => 24, 'account_id1'=>null,   'account_code1' => null,        'account_name1' => null,                        'account_id2'=>31,      'account_code2'=>"220.02",  'account_name2'=>'Modal Penyertaan' ,               'report_type1'=>2,'report_tab1'=>0 ,'report_bold1'=>0,   'report_type2'=>2,'report_tab2'=>0 ,'report_bold2'=>0, 'balance_report_type'=>0,'balance_report_type1'=>0],
                [ 'report_no' => 25, 'account_id1'=>17,     'account_code1' => "103.00",    'account_name1' => 'Akumulasi Penyusutan',      'account_id2'=>32,      'account_code2'=>"202.03",  'account_name2'=>'L/R Tahun Lalu' ,                 'report_type1'=>2,'report_tab1'=>0 ,'report_bold1'=>0,   'report_type2'=>2,'report_tab2'=>0 ,'report_bold2'=>0,  'balance_report_type'=>0,'balance_report_type1'=>0],
                [ 'report_no' => 26, 'account_id1'=>18,     'account_code1' => "103.01",    'account_name1' => 'Akumulasi Penyusutan Hardware','account_id2'=>33,   'account_code2'=>"202.04",  'account_name2'=>'PRIVE PMS' ,                      'report_type1'=>2,'report_tab1'=>0 ,'report_bold1'=>0,   'report_type2'=>2,'report_tab2'=>0 ,'report_bold2'=>0,  'balance_report_type'=>0,'balance_report_type1'=>0],
                [ 'report_no' => 27, 'account_id1'=>19,     'account_code1' => "103.02",    'account_name1' => 'Akumulasi Penyusutan Kantor','account_id2'=>null,   'account_code2'=>null,      'account_name2'=>null ,                             'report_type1'=>2,'report_tab1'=>0 ,'report_bold1'=>0,   'report_type2'=>2,'report_tab2'=>0 ,'report_bold2'=>0,  'balance_report_type'=>0,'balance_report_type1'=>0],
                [ 'report_no' => 28, 'account_id1'=>14,     'account_code1' => "102.00",    'account_name1' => 'AKTIVA TETAP'               ,'account_id2'=>null,   'account_code2'=>null,      'account_name2'=>null ,                             'report_type1'=>1,'report_tab1'=>0 ,'report_bold1'=>1,   'report_type2'=>2,'report_tab2'=>0 ,'report_bold2'=>0,  'balance_report_type'=>0,'balance_report_type1'=>0],
                [ 'report_no' => 29, 'account_id1'=>null,   'account_code1' => null,        'account_name1' => null,                        'account_id2'=>29,      'account_code2'=>"202.00",   'account_name2'=>'MODAL/EKUITAS',                   'report_type1'=>1,'report_tab1'=>0 ,'report_bold1'=>0,   'report_type2'=>1,'report_tab2'=>0 ,'report_bold2'=>1,  'balance_report_type'=>0,'balance_report_type1'=>0],
                [ 'report_no' => 30, 'account_id1'=>null,   'account_code1' => null,        'account_name1' => 'JUMLAH AKTIVA',             'account_id2'=>null,     'account_code2'=>null,      'account_name2'=>'JUMLAH PASIVA',                   'report_type1'=>2,'report_tab1'=>0 ,'report_bold1'=>1,   'report_type2'=>2,'report_tab2'=>0 ,'report_bold2'=>1,  'balance_report_type'=>0,'balance_report_type1'=>0],
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('acct_balance_sheet_report');
    }
};