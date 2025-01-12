<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\CoreBranchDataTable;
use App\Models\AcctAccount;
use App\Models\CoreBranch;

class CoreBranchController extends Controller
{
    public function index(CoreBranchDataTable $dataTable)
    {
        return $dataTable->render('content.CoreBranch.List.index');
    }

    public function add()
    {
        $branch_data = CoreBranch::select('branch_id', 'branch_code', 'branch_name', 'branch_address', 'branch_city', 'branch_contact_person', 'branch_email', 'branch_phone1', 'branch_manager', 'account_rak_id','account_aka_id')
        ->get();
        $acctacount = AcctAccount::select('account_id', 'account_name','account_code')
        ->get();
        return view('content.CoreBranch.add.index', compact('branch_data','acctacount'));
    }

    public function processAdd(Request $request)
    {
        $fields = $request->validate([
            'branch_code'                   => ['required'],
            'branch_name'                   => ['required'],
            'branch_city'                   => ['required'],
            'branch_address'                => ['required'],
            'branch_manager'                => ['required'],
            'branch_contact_person'         => ['required'],
            'branch_email'                  => ['required'],
            'branch_phone1'                 => ['required'],
            'account_rak_id'                => ['required'],
            'account_aka_id'                => ['required'],
        ]);

        $branch = array(
            'branch_code'                   => $fields['branch_code'],
            'branch_name'                   => $fields['branch_name'],
            'branch_city'                   => $fields['branch_city'],
            'branch_address'                => $fields['branch_address'],
            'branch_manager'                => $fields['branch_manager'],
            'branch_contact_person'         => $fields['branch_contact_person'],
            'branch_email'                  => $fields['branch_email'],
            'branch_phone1'                 => $fields['branch_phone1'],
            'account_rak_id'                => $fields['account_rak_id'],
            'account_aka_id'                => $fields['account_aka_id'],
            'created_id'                    => auth()->user()->user_id,
        );


        if(CoreBranch::create($branch)){
            $message = array(
                'pesan' => 'Kode Cabang berhasil ditambah',
                'alert' => 'success'
            );
        }else{
            $message = array(
                'pesan' => 'Kode Cabang gagal ditambah',
                'alert' => 'error'
            );
        }

        return redirect('branch')->with($message);
    }

    public function edit($id)
    {
        $corebranch = CoreBranch::select('branch_id', 'branch_code', 'branch_name', 'branch_address', 'branch_city', 'branch_contact_person', 'branch_email', 'branch_phone1', 'branch_manager', 'account_rak_id','account_aka_id')
        ->where('branch_id', $id)
        ->first();
        $acctacount = AcctAccount::select('account_id', 'account_name','account_code')
        ->get();

        return view('content.CoreBranch.Edit.index', compact('corebranch','acctacount'));
    }

    public function processEdit(Request $request)
    {
        $fields = $request->validate([
            'branch_id'                 => ['required'],
            'branch_code'               => ['required'],
            'branch_name'               => ['required'],
            'branch_address'            => [''],
            'branch_city'               => ['required'],
            'branch_contact_person'     => ['required'],
            'branch_email'              => ['required'],
            'branch_phone1'             => ['required'],
            'branch_manager'            => ['required'],
            'account_rak_id'            => ['required'],
            'account_aka_id'            => ['required'],
        ]);

        $corebranch                         = CoreBranch::findOrFail($fields['branch_id']);
        $corebranch->branch_code            = $fields['branch_code'];
        $corebranch->branch_name            = $fields['branch_name'];
        $corebranch->branch_address         = $fields['branch_address'];
        $corebranch->branch_city            = $fields['branch_city'];
        $corebranch->branch_contact_person  = $fields['branch_contact_person'];
        $corebranch->branch_email           = $fields['branch_email'];
        $corebranch->branch_phone1          = $fields['branch_phone1'];
        $corebranch->branch_manager         = $fields['branch_manager'];
        $corebranch->account_rak_id         = $fields['account_rak_id'];
        $corebranch->account_aka_id         = $fields['account_aka_id'];
        $corebranch->updated_id             = auth()->user()->user_id;

        if($corebranch->save()){
            $message = array(
                'pesan' => 'Kode Cabang berhasil diubah',
                'alert' => 'success'
            );
        }else{
            $message = array(
                'pesan' => 'Kode Cabang gagal diubah',
                'alert' => 'error'
            );
        }

        return redirect('branch')->with($message);
    }

    public function delete($id)
    {
        $corebranch                 = CoreBranch::findOrFail($id);
        $corebranch->updated_id     = auth()->user()->user_id;

        if($corebranch->delete()){
            $message = array(
                'pesan' => 'Kode Cabang berhasil dihapus',
                'alert' => 'success'
            );
        }else{
            $message = array(
                'pesan' => 'Kode Cabang gagal dihapus',
                'alert' => 'error'
            );
        }

        return redirect('branch')->with($message);
    }
}
