<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\CoreBranch;
use App\Models\SystemMenu;
use App\Models\SystemUserGroup;
use App\DataTables\SystemUserDataTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Helpers\Configuration;

class UsersController extends Controller
{
    public function index(SystemUserDataTable $dataTable)
    {
        return $dataTable->render('content.SystemUser.List.index');
    }

    public function add()
    {
        $branchstatus = Configuration::BranchStatus();
        $config = theme()->getOption('page', 'user');
    
        $usergroup = SystemUserGroup::select('user_group_id', 'user_group_name')->get();
        $corebranch = CoreBranch::select('branch_id', 'branch_name')->get();
    
        return view('content.SystemUser.Add.index', compact('usergroup', 'corebranch', 'branchstatus'));
    }
    
    public function processAdd(Request $request)
    {
        $fields = $request->validate([
            'username'      => 'required',
            'password'      => 'required',
            'user_group_id' => 'required',
            'branch_id'     => 'required',
            'branch_status' => 'required',
        ]);
    
        // Check if username exists
        $existingUser = User::where('username', $fields['username'])->first();
        if ($existingUser) {
            $message = [
                'pesan' => 'User dengan username "' . $fields['username'] . '" sudah ada. Gunakan username lain.',
                'alert' => 'error'
            ];
            return redirect()->route('user.add')->withInput()->with($message);
        }
    
        // Buat instance baru dari model User dan isi dengan data yang divalidasi
        $user = new User([
            'username'      => $fields['username'],
            'password'      => Hash::make($fields['password']),
            'user_group_id' => $fields['user_group_id'],
            'branch_id'     => $fields['branch_id'],
            'branch_status' => $fields['branch_status'],
        ]);
    
        // Simpan user ke dalam database
        if ($user->save()) {
            $message = [
                'pesan' => 'User berhasil ditambah',
                'alert' => 'success'
            ];
        } else {
            $message = [
                'pesan' => 'User gagal ditambah',
                'alert' => 'error'
            ];
        }
    
        return redirect()->route('user.index')->with($message);
    }
    

    public function edit($id)
    {
        $config = theme()->getOption('page', 'user');
        $user = User::find($id);
        
        // Mengambil semua data dari model SystemUserGroup
        $usergroup = SystemUserGroup::all(['user_group_id', 'user_group_name']);
    
        $corebranch = CoreBranch::all(['branch_id', 'branch_name']);
    
        return view('content.SystemUser.Edit.index', compact('user', 'usergroup', 'corebranch'));
    }
    

    public function processEdit(Request $request)
    {

        $fields = request()->validate([
            'user_id'       =>['required'],
            'username'      =>['required'],
            'user_group_id' =>['required'],
            // 'branch_id'     =>['required'],
        ]);
        $user                   = User::findOrFail($fields['user_id']);
        $user->username         = $fields['username'];
        $user->user_group_id    = $fields['user_group_id'];
        // $user->branch_id        = $fields['branch_id'];
        if($request->passIsChanged){
        $user->password = Hash::make($request->password);
        }
        if($user->save()){
            $message = array(
                'pesan' => 'User berhasil diubah',
                'alert' => 'success'
            );
        }else{
            $message = array(
                'pesan' => 'User gagal diubah',
                'alert' => 'error'
            );
        }

        return redirect('user')->with($message);
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
    
        if ($user->delete()) {
            $message = [
                'pesan' => 'User berhasil dihapus',
                'alert' => 'success'
            ];
        } else {
            $message = [
                'pesan' => 'User gagal dihapus',
                'alert' => 'error'
            ];
        }
    
        return redirect('user')->with($message);
    }
    


    public function resetPassword($id)
    {
        $user = User::findOrFail($id);
        $newPassword = '123456'; // Password baru yang akan direset
    
        $user->password = Hash::make($newPassword);
    
        if ($user->save()) {
            $message = [
                'pesan' => 'Password pengguna berhasil direset',
                'alert' => 'success'
            ];
        } else {
            $message = [
                'pesan' => 'Password pengguna gagal direset',
                'alert' => 'error'
            ];
        }
    
        return redirect('user')->with($message);
    }
}
