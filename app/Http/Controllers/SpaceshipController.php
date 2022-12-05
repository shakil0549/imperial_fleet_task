<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Spaceship;
use App\Models\Armament;
use Illuminate\Support\Facades\DB;
class SpaceshipController extends Controller
{
    
    public function index($value='')
    {
         
    }

    public function add(){

      return view('spaceship.add');  

    }

    public function list_spaceship(){
 
      $allSpaceships  =   Spaceship::select('id','spaceship_name','spaceship_class')->get();
    return json_encode(array('data' => $allSpaceships));

      /*print_r($allSpaceships);exit;
       return  view('spaceship.list')->with(array('all_spaceships' =>$allSpaceships));
*/
    }

    public function spaceship_detail($id){
 
 
     $allSpaceships  =  Spaceship::find($id)->armament;
     return json_encode(array('data' => $allSpaceships));

     }





     public function add_spaceship(Request $request)
    {
        

        $validator   =   $request->validate([
                'name' => 'required',
                'spaceship_class' => 'required',
                'crew' => 'required',
                'crew' => 'required',
                'file' => 'required|mimes:png,jpg,jpeg',
                'spaceship_value' => 'required|integer',
                'status' => 'required',
 
            ]); 
        if($validator){ 

            //$fileName = auth()->id() . '_' . time() . '.'. $request->file->extension();  
            $fileName =   time() . '.'. $request->file->extension();  
            //$type = $request->file->getClientMimeType();
            //$size = $request->file->getSize();
            $request->file->move(public_path('spaceship'), $fileName);
            
            $newspaceship= new Spaceship();

            $newspaceship->spaceship_name  = $request->post('name');
            $newspaceship->spaceship_class = $request->post('spaceship_class');
            $newspaceship->crew = $request->post('crew');
            $newspaceship->spaceship_value = $request->post('spaceship_value');
            $newspaceship->status = $request->post('status');
            $newspaceship->image = $fileName; 
            $newspaceship->save();

            $spaceship_id   =   $newspaceship->id;

            $armament= new Armament();

            $random_title   =   array('Turbo Laser','Ion Cannons','Tractor Beam');
            $random_qty   =   array('40','60','80','20');
           
            $armament->title =  $random_title[array_rand($random_title, 1)];
            $armament->qty =  $random_qty[array_rand($random_qty, 1)];
            $armament->spaceship_id =  $spaceship_id;

            $armament->save();
            
            return response()->json(['success' => 'true']); 
          }else{
            return response()->json(['success' => 'false']); 
          }
        
         
    }

    public function edit_spaceship($id){
        $spaceship_data  =   Spaceship::find($id);
        return  view('spaceship.edit')->with(array('spaceship' =>$spaceship_data));
    }

    public function update_spaceship(Request $request){

 
         $validator   =   $request->validate([
                'name' => 'required',
                'spaceship_class' => 'required',
                'crew' => 'required',
                'crew' => 'required',
                'spaceship_value' => 'required|integer',
                'status' => 'required',
 
            ]);

        $id=$request->id;
        $spaceship  =   Spaceship::find($id);
        //print_r($request->all());exit;
        $filename = $spaceship->image;
          if($request->file != ''){        
          $path = public_path();

          //code for remove old file
          if($spaceship->image != ''  && $spaceship->image != null){
               $file_old = $path.'/spaceship/'.$filename;
               unlink($file_old);
          }

          //upload new file
          $file = $request->file;
          //$filename = $file->getClientOriginalName();
          $filename =   time() . '.'. $request->file->extension();  
          $file->move($path, $filename);
          //for update in table   
        }
     
         DB::table('spaceship')
            ->where('id', $id)
            ->update([
            'spaceship_name' => $request->post('name') ,
            'spaceship_class' => $request->post('spaceship_class'),
            'crew' => $request->post('crew'),
            'spaceship_value' => $request->post('spaceship_value'),
            'status' => $request->post('status'),
            'image' => $filename,

        ]);
        //armament table data update base on spaceship data
        $random_title   =   array('Turbo Laser','Ion Cannons','Tractor Beam');
        $random_qty   =   array('40','60','80','20');

         $armament = Armament::select('*')->where('spaceship_id', $id)->get();
        if($armament){
         DB::table('armament')
            ->where('spaceship_id', $id)
            ->update(
                [
                'title' =>$random_title[array_rand($random_title, 1)],
                'qty' => $random_qty[array_rand($random_qty, 1)],
                ]
            ); 
        }

        
        return response()->json(['success' => 'true']); 

    }


    public function delete_spaceship($id){
         $spaceship = Spaceship::find($id); 
         $spaceship->delete();
       
        return response()->json(['success' => 'true']); 

      }



}
