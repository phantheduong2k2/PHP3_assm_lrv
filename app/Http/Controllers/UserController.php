<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    public function index(Request $request)
    {
        $name = $request->get('name');
        if($name){
            $user = User::Where('name','like','%'. $name. '%')
            ->paginate(5);
        }else{
            $user = User::select('*')
            ->paginate(5);
        }

        return view('admin.user.list',[
            'user_list' => $user,
            'name' => $name
        ]);
    }


    public function create(){
        return view('admin.user.add');
    }
         // Add
    private function saveFile($file, $prefixName = '', $folder = 'public')
    {
        $fileName = $file->hashName();
        $fileName = $prefixName
            ? $prefixName . '_' . $fileName
            : $fileName;

        return $file->storeAs($folder, $fileName);
    }
       // Ham save file


    public function store( Request $request){
        $user = new User();
        $user->fill($request->all());
            if ($request->hasFile('avatar')) {
                $user->avatar = $this->saveFile(
                    $request->avatar,
                    $request->name,
                    'images/user/'
                );
            } else {
                $user->avatar = '';
            }

            $user->save();
            return redirect(Route('user-list'));
    }

    public function updateLevels($id){
        $levelUpdate = User::select('level')->where('id', $id)->first();
        if($levelUpdate->level == 0){
            $level = 1;
        }else{
            $level = 0;
        }
         User::where('id', $id)->update(['level'=> $level]);
         return redirect()->back();
    }
}
