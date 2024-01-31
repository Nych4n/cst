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
        if(!Schema::hasTable('acct_profit_loss_report')) {
            Schema::create('acct_profit_loss_report', function (Blueprint $table) {
                $table->id('profit_loss_report_id');
                $table->unsignedBigInteger('account_type_id')->nullable();
                $table->integer('report_no')->nullable();
                $table->unsignedBigInteger('account_id')->nullable();                
                $table->foreign('account_id')->references('account_id')->on('acct_account')->onUpdate('cascade')->onDelete('set null');
                $table->string('account_code')->nullable();
                $table->string('account_name')->nullable();
                
                $table->string('report_formula')->nullable();
                $table->string('report_operator')->nullable();
                $table->integer('report_type')->nullable();
                $table->integer('report_tab')->nullable();
                $table->integer('report_bold')->nullable();
                
                $table->unsignedBigInteger('created_id')->nullable();
                $table->unsignedBigInteger('updated_id')->nullable();
                $table->unsignedBigInteger('deleted_id')->nullable();
                $table->timestamps();
                $table->softDeletesTz();
            });
            DB::table('acct_profit_loss_report')->insert([
                [ 'account_type_id'=>2,  'report_no'=>1, 'account_id'=>31,      'account_code' => '300',        'account_name'=>'PENDAPATAN',                       'report_formula'=>'',           'report_operator'=>'',            'report_type'=>1 , 'report_tab'=>1 ,'report_bold'=>1 ],
                [ 'account_type_id'=>2,  'report_no'=>4, 'account_id'=>34,      'account_code' => '300.03',     'account_name'=>'Pendapatan Divisi Multimedia',     'report_formula'=>'',           'report_operator'=>'',            'report_type'=>3 , 'report_tab'=>3 ,'report_bold'=>0 ],
                [ 'account_type_id'=>2,  'report_no'=>2, 'account_id'=>32,      'account_code' => '300.01',     'account_name'=>'Pendapatan Software',              'report_formula'=>'',           'report_operator'=>'',            'report_type'=>3 , 'report_tab'=>3 ,'report_bold'=>0 ],
                [ 'account_type_id'=>2,  'report_no'=>6, 'account_id'=>36,      'account_code' => '300.05',     'account_name'=>'Pendapatan Lainnya',               'report_formula'=>'',           'report_operator'=>'',            'report_type'=>3 , 'report_tab'=>3 ,'report_bold'=>0 ],
                [ 'account_type_id'=>2,  'report_no'=>3, 'account_id'=>33,      'account_code' => '300.02',     'account_name'=>'Pendapatan Penjualan Hardware',    'report_formula'=>'',           'report_operator'=>'',            'report_type'=>3 , 'report_tab'=>3 ,'report_bold'=>0 ],
                [ 'account_type_id'=>2,  'report_no'=>5, 'account_id'=>35,      'account_code' => '300.04',     'account_name'=>'Pendapatan Jasa Lainnya',          'report_formula'=>'',           'report_operator'=>'',            'report_type'=>3 , 'report_tab'=>3 ,'report_bold'=>0 ],
                [ 'account_type_id'=>2,  'report_no'=>7, 'account_id'=>null ,   'account_code' => '',           'account_name'=>'JUMLAH PENDAPATAN',                'report_formula'=>'2#3#4#5#6',  'report_operator'=>'+#+#+#+#+',   'report_type'=>5 , 'report_tab'=>2 ,'report_bold'=>1 ],
                
                [ 'account_type_id'=>0,  'report_no'=>8, 'account_id'=>NULL,      'account_code' => '',     'account_name'=>'',  'report_formula'=>'',           'report_operator'=>'',            'report_type'=>0 , 'report_tab'=>3 ,'report_bold'=>0 ],
                
                [ 'account_type_id'=>3,  'report_no'=>9, 'account_id'=>38,      'account_code' => '401.00',     'account_name'=>'BEBAN OPERASIONAL',                    'report_formula'=>'',                               'report_operator'=>'',                      'report_type'=>1 , 'report_tab'=>1 ,'report_bold'=>1 ],
                [ 'account_type_id'=>3,  'report_no'=>10, 'account_id'=>39,      'account_code' => '401.01',     'account_name'=>'Beban Tenaga Kerja',                  'report_formula'=>'',                               'report_operator'=>'',                      'report_type'=>3 , 'report_tab'=>3 ,'report_bold'=>0 ],
                [ 'account_type_id'=>3,  'report_no'=>11, 'account_id'=>40,      'account_code' => '401.02',     'account_name'=>'Beban BPJSTK',                        'report_formula'=>'',                               'report_operator'=>'',                      'report_type'=>3 , 'report_tab'=>3 ,'report_bold'=>0 ],
                [ 'account_type_id'=>3,  'report_no'=>12, 'account_id'=>41,      'account_code' => '401.03',     'account_name'=>'Beban Server, Domain',                'report_formula'=>'',                               'report_operator'=>'',                      'report_type'=>3 , 'report_tab'=>3 ,'report_bold'=>0 ],
                [ 'account_type_id'=>3,  'report_no'=>13, 'account_id'=>42,      'account_code' => '401.04',     'account_name'=>'Beban Kontrak Aplikasi',              'report_formula'=>'',                               'report_operator'=>'',                      'report_type'=>3 , 'report_tab'=>3 ,'report_bold'=>0 ],
                [ 'account_type_id'=>3,  'report_no'=>14, 'account_id'=>43,      'account_code' => '401.05',     'account_name'=>'Beban Listrik, Internet, Komunikasi', 'report_formula'=>'',                               'report_operator'=>'',                      'report_type'=>3 , 'report_tab'=>3 ,'report_bold'=>0 ],
                [ 'account_type_id'=>3,  'report_no'=>15, 'account_id'=>44,      'account_code' => '401.06',     'account_name'=>'Beban ATK',                           'report_formula'=>'',                               'report_operator'=>'',                      'report_type'=>3 , 'report_tab'=>3 ,'report_bold'=>0 ],
                [ 'account_type_id'=>3,  'report_no'=>16, 'account_id'=>45,      'account_code' => '401.07',     'account_name'=>'Beban  Perjalanan Dinas',             'report_formula'=>'',                               'report_operator'=>'',                      'report_type'=>3 , 'report_tab'=>3 ,'report_bold'=>0 ],
                [ 'account_type_id'=>3,  'report_no'=>17, 'account_id'=>46,      'account_code' => '401.08',     'account_name'=>'Beban Tenaga Teknisi',                'report_formula'=>'',                               'report_operator'=>'',                      'report_type'=>3 , 'report_tab'=>3 ,'report_bold'=>0 ],
                [ 'account_type_id'=>3,  'report_no'=>18, 'account_id'=>47,      'account_code' => '401.09',     'account_name'=>'Beban Komisi Penjualan',              'report_formula'=>'',                               'report_operator'=>'',                      'report_type'=>3 , 'report_tab'=>3 ,'report_bold'=>0 ],
                [ 'account_type_id'=>3,  'report_no'=>19, 'account_id'=>48,      'account_code' => '401.10',     'account_name'=>'Beban Share Fee',                     'report_formula'=>'',                               'report_operator'=>'',                      'report_type'=>3 , 'report_tab'=>3 ,'report_bold'=>0 ],
                [ 'account_type_id'=>3,  'report_no'=>20, 'account_id'=>null ,   'account_code' => '',           'account_name'=>'JUMLAH BEBAN OPERASIONAL',            'report_formula'=>'10#11#12#13#14#15#16#17#18#19',  'report_operator'=>'+#+#+#+#+#+#+#+#+#+',   'report_type'=>5 , 'report_tab'=>2 ,'report_bold'=>1 ],
                
                [ 'account_type_id'=>0,  'report_no'=>21, 'account_id'=>NULL,      'account_code' => '',     'account_name'=>'',  'report_formula'=>'',           'report_operator'=>'',            'report_type'=>0 , 'report_tab'=>3 ,'report_bold'=>0 ],
                [ 'account_type_id'=>0,  'report_no'=>22, 'account_id'=>NULL,      'account_code' => '',     'account_name'=>'',  'report_formula'=>'',           'report_operator'=>'',            'report_type'=>0 , 'report_tab'=>3 ,'report_bold'=>0 ],
                
                [ 'account_type_id'=>3,  'report_no'=>24, 'account_id'=>50,      'account_code' => '402.01',     'account_name'=>'Beban Pembelian Pantry',               'report_formula'=>'',                            'report_operator'=>'',                    'report_type'=>3 , 'report_tab'=>3 ,'report_bold'=>0 ],
                [ 'account_type_id'=>3,  'report_no'=>23, 'account_id'=>49,      'account_code' => '402.00',     'account_name'=>'Beban NON OPERASIONAL',                'report_formula'=>'',                            'report_operator'=>'',                    'report_type'=>1 , 'report_tab'=>1 ,'report_bold'=>1 ],
                [ 'account_type_id'=>3,  'report_no'=>25, 'account_id'=>51,      'account_code' => '402.02',     'account_name'=>'Beban Marketing dan Promosi',          'report_formula'=>'',                            'report_operator'=>'',                    'report_type'=>3 , 'report_tab'=>3 ,'report_bold'=>0 ],
                [ 'account_type_id'=>3,  'report_no'=>26, 'account_id'=>52,      'account_code' => '402.03',     'account_name'=>'Beban Maintenance/Service',            'report_formula'=>'',                            'report_operator'=>'',                    'report_type'=>3 , 'report_tab'=>3 ,'report_bold'=>0 ],
                [ 'account_type_id'=>3,  'report_no'=>27, 'account_id'=>53,      'account_code' => '402.04',     'account_name'=>'Beban Entertaintment',                 'report_formula'=>'',                            'report_operator'=>'',                    'report_type'=>3 , 'report_tab'=>3 ,'report_bold'=>0 ],
                [ 'account_type_id'=>3,  'report_no'=>28, 'account_id'=>54,      'account_code' => '403.00',     'account_name'=>'Beban Di Luar Usaha',                  'report_formula'=>'',                            'report_operator'=>'',                    'report_type'=>3 , 'report_tab'=>3 ,'report_bold'=>0 ],
                [ 'account_type_id'=>3,  'report_no'=>29, 'account_id'=>55,      'account_code' => '403.01',     'account_name'=>'Beban Perijinan',                      'report_formula'=>'',                            'report_operator'=>'',                    'report_type'=>3 , 'report_tab'=>3 ,'report_bold'=>0 ],
                [ 'account_type_id'=>3,  'report_no'=>30, 'account_id'=>56,      'account_code' => '403.02',     'account_name'=>'Beban Sumbangan',                      'report_formula'=>'',                            'report_operator'=>'',                    'report_type'=>3 , 'report_tab'=>3 ,'report_bold'=>0 ],
                [ 'account_type_id'=>3,  'report_no'=>31, 'account_id'=>57,      'account_code' => '403.03',     'account_name'=>'Beban Entertaintment',                 'report_formula'=>'',                            'report_operator'=>'',                    'report_type'=>3 , 'report_tab'=>3 ,'report_bold'=>0 ],
                [ 'account_type_id'=>3,  'report_no'=>32, 'account_id'=>58,      'account_code' => '403.04',     'account_name'=>'Beban Iuran Lain - Lain',              'report_formula'=>'',                            'report_operator'=>'',                    'report_type'=>3 , 'report_tab'=>3 ,'report_bold'=>0 ],
                [ 'account_type_id'=>3,  'report_no'=>33, 'account_id'=>null ,   'account_code' => '',           'account_name'=>'JUMLAH BEBAN NON OPERASIONAL',         'report_formula'=>'24#25#26#27#28#29#30#31#32',  'report_operator'=>'+#+#+#+#+#+#+#+#+',   'report_type'=>5 , 'report_tab'=>2 ,'report_bold'=>1 ],
                [ 'account_type_id'=>3,  'report_no'=>34, 'account_id'=>null ,   'account_code' => '',           'account_name'=>'JUMLAH BEBAN ',                        'report_formula'=>'10#11#12#13#14#15#16#17#18#19#24#25#26#27#28#29#30#31#32', 'report_operator'=>'+#+#+#+#+#+#+#+#+#+#+#+#+#+#+#+#+#+#+',                 'report_type'=>5 , 'report_tab'=>2 ,'report_bold'=>1 ],
                
                [ 'account_type_id'=>0,  'report_no'=>35, 'account_id'=>NULL,      'account_code' => '',     'account_name'=>'',  'report_formula'=>'',           'report_operator'=>'',            'report_type'=>0 , 'report_tab'=>3 ,'report_bold'=>0 ],
                
                [ 'account_type_id'=>0,  'report_no'=>36, 'account_id'=>null ,   'account_code' => '',      'account_name'=>'Sisa Hasil Usaha ',             'report_formula'=>'7#34',        'report_operator'=>'-#-','report_type'=>1 , 'report_tab'=>2 ,'report_bold'=>1 ],
                
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};