<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Good;
use DB;
use Intervention\Image\Facades\Image;
use Illuminate\Http\RedirectResponse;
class FunctionsController extends Controller
{
    //
  /*  public function __construct(){
        $this->middleware('guest');
    }*/
    public function index(Request $request){



    if(!empty($_FILES)) {
        dump(session()->all());
        // Файл передан через обычный массив $_FILES
        echo 'Contents of $_FILES:<br/><pre>'.print_r($_FILES, true).'</pre>';
        $file = $_FILES['my-pic'];
        $file_name=$file['name'];
        $ppos = strrpos($file_name, '.');
        $file_name = substr($file_name, 0, $ppos).'('.md5(uniqid(rand(),1)).').'.substr($file_name, $ppos + 1);

        $tmp_name=$file['tmp_name'];
        $uploads_dir='photos';
        $upload=$uploads_dir.'/'.$file_name;




        move_uploaded_file($tmp_name, "$uploads_dir/$file_name");
        $this->resize_($upload,$uploads_dir,$file_name,'file_name');

        /* $data['img']='/photos/'.$file_name;
        $this->baget_model->insert($data); */
        // Внимание! Имя файла для Blob-данных может различаться в разных браузерах
        if ( ($file['type'] == 'image/png') && ($file['name'] == 'blob') ) {
            //move_uploaded_file($file['tmp_name'], './canvas-' . uniqid() . '.png');
        }
    }
}

private function resize_($upload,$uploads_dir,$file_name,$process){
    //resize of the images
    //image1_small
    $image_info = getimagesize($upload);
    $img_width=$image_info[0];
    $img_height=$image_info[1];
    //проверяем больше ли ширена высоты
    //если больше меняем ширену и высоту
    //real 305x427
    //500х335  (1,4925)

    if($img_height>$img_width) {
        $ratio_img=$image_info[1]/$image_info[0];//1,4


        $img = Image::make($upload);
// resize image instance
        dump('335Xratio_img');
        dump(335/$ratio_img);
//500х335  (1,4925)
        $img->resize(335/$ratio_img, 335); //1,4
// set a background-color for the emerging area
        $img->resizeCanvas(500, 335, 'center', false, 'fff');
// insert a watermark
// save image in desired format
        $img->save($uploads_dir.'/image_small'.$file_name);
        $this->kind($process,'image_small'.$file_name);

        $img = Image::make($upload);
// resize image instance


//image1_medium
//1000х667  (1,499)
        $img->resize(667/$ratio_img, 667); //1,4
// set a background-color for the emerging area
        $img->resizeCanvas(1000, 667, 'center', false, 'fff');
// insert a watermark
// save image in desired format
        $img->save($uploads_dir.'/image_medium'.$file_name);
        $this->kind($process,'image_madium');


        $img = Image::make($upload);
// resize image instance
//2000х1333  (1,499)
        $img->resize(1333/$ratio_img, 1333); //1,4
// set a background-color for the emerging area
        $img->resizeCanvas(2000, 1333, 'center', false, 'fff');
// insert a watermark
// save image in desired format
        $img->save($uploads_dir.'/image_large'.$file_name);
        $this->kind($process,'image_large');


    }
    if($img_height<$img_width ) {
        $ratio_img=$image_info[0]/$image_info[1];//1,4

        $img = Image::make($upload);
// resize image instance
//image1_small
//500х335  (1,4925)
        $img->resize(500, 500/$ratio_img); //1,4
// set a background-color for the emerging area
        $img->resizeCanvas( 500,335, 'center', false, 'fff');
// insert a watermark
// save image in desired format
        $img->save($uploads_dir.'/image_small'.$file_name);
        $this->kind($process,'image_small');

        $img = Image::make($upload);
// resize image instance
//image1_medium
//1000х667  (1,499)
        $img->resize(1000,1000/$ratio_img ); //1,4
// set a background-color for the emerging area
        $img->resizeCanvas(1000,667,  'center', false, 'fff');
// insert a watermark
// save image in desired format
        $img->save($uploads_dir.'/image_medium'.$file_name);
        $this->kind($process,'image_medium');

        $img = Image::make($upload);
// resize image instance
//image1_large

//2000х1333  (1,499)
        $img->resize(2000,2000/$ratio_img ); //1,4
// set a background-color for the emerging area
        $img->resizeCanvas(2000, 1333, 'center', false, 'fff');
// insert a watermark
// save image in desired format
        $img->save($uploads_dir.'/image_large'.$file_name);
        $this->kind($process,'image_large');
    }
    if($img_height==$img_width ) {
        $ratio_img=$image_info[0]/$image_info[1];//1,4
        $img = Image::make($upload);
// resize image instance
//image1_small
//500х335  (1,4925)
        $img->resize(335, 335); //1,4
// set a background-color for the emerging area
        $img->resizeCanvas( 500,335, 'center', false, 'fff');
// insert a watermark
// save image in desired format
        $img->save($uploads_dir.'/image_small'.$file_name);
        $this->kind($process,'image_small');
        $img = Image::make($upload);
// resize image instance
//image1_medium
//1000х667  (1,499)
        $img->resize(667,667 ); //1,4
// set a background-color for the emerging area
        $img->resizeCanvas(1000,667,  'center', false, 'fff');
// insert a watermark
// save image in desired format
        $img->save($uploads_dir.'/image_medium'.$file_name);
        $this->kind($process,'image_medium');
        $img = Image::make($upload);
// resize image instance
//image1_large
//2000х1333  (1,499)
        $img->resize(1333,1333); //1,4
// set a background-color for the emerging area
        $img->resizeCanvas(2000, 1333, 'center', false, 'fff');
// insert a watermark
// save image in desired format
        $img->save($uploads_dir.'/image_large'.$file_name);
        $this->kind($process,'image_large');
    }

}

    private function kind($process,$kind_of_img){
        if (session()->has($process)) {
            $sess_array=session($process);
            $last_key = key( array_slice( $sess_array, -1, 1, TRUE ) );
            session()->push($process,$kind_of_img);
        }
        else{

            session(['$process.0'=>$kind_of_img]);
        }
    }
    public function main_image(Request $request){

        if(!empty($_FILES)) {
            dump(session()->all());
            // Файл передан через обычный массив $_FILES
            echo 'Contents of $_FILES:<br/><pre>'.print_r($_FILES, true).'</pre>';
            $file = $_FILES['my-pic'];
            $file_name=$file['name'];
            $ppos = strrpos($file_name, '.');
            $file_name = substr($file_name, 0, $ppos).'('.md5(uniqid(rand(),1)).').'.substr($file_name, $ppos + 1);

            $tmp_name=$file['tmp_name'];
            $uploads_dir='photos';

            move_uploaded_file($tmp_name, "$uploads_dir/$file_name");
            $this->resize_($upload,$uploads_dir,$file_name,'file_name_main_image');

            // Внимание! Имя файла для Blob-данных может различаться в разных браузерах
            if ( ($file['type'] == 'image/png') && ($file['name'] == 'blob') ) {
                //move_uploaded_file($file['tmp_name'], './canvas-' . uniqid() . '.png');
            }
        }
    }

 public function form(Request $request){
        if ($request->ajax()) {
        $main_array=$request->input();

        }

     $main_array=$_POST;
//Add photos
    if(!empty(session('file_name'))){
        $data_m = Good::all();
        $last_data_object = collect($data_m)->last();

        $last_data_object =$last_data_object['original']['id'];
        foreach (session('file_name') as $key=> $photo) {
            $photo_set[] = [
                'id' => NULL,
                'id_good'  => $last_data_object+1,
                'photo'    => $photo
            ];

        }

        DB::table('photos')->insert($photo_set);

    }
//Add videos
if(!empty($main_array['video1']) ){
    $check=1;

    $video_set[0]=[
        'id' => NULL,
        'id_good'  => $last_data_object+1,
        'video'=> $main_array['video1']

    ];

}
if(!empty($main_array['video2'])){
    $check=1;
     $video_set[1]=[
         'id' => NULL,
         'id_good'  => $last_data_object+1,
         'video'=> $main_array['video2']

     ];}
if(!empty($main_array['video3'])){
    $check=1;
     $video_set[2]=[
         'id' => NULL,
         'id_good'  => $last_data_object+1,
         'video'=> $main_array['video3']

     ];}
if(!empty($main_array['video4'])){
    $check=1;
     $video_set[3]=[
         'id' => NULL,
         'id_good'  => $last_data_object+1,
         'video'=> $main_array['video4']

     ];}
     if(isset($check) && $check==1){
         DB::table('videos')->insert($video_set);
     }

//Add goods_
     $main_image=session('file_name_main_image');

         $dataSet['type'] = $main_array['type'];
         $dataSet['category'] = $main_array['category'];
         $dataSet['articul'] = $main_array['artikul'];
         $dataSet['description'] = $main_array['editor1'];
         $dataSet['name'] = $main_array['name'];
         $dataSet['price'] = $main_array['price'];
         $dataSet['photo']=$main_image[0];
         DB::table('goods')->insert($dataSet);

    }

    public function role(Request $request){
        
        if ($request->ajax()) {
         $inp_array=$request->input();
//поменять роль
         DB::table('role_user')-> where('user_id', $inp_array['user'])

                ->update(['role_id' => $inp_array['role']]);


        }
        
    }
    public function delete_user(Request $request){

        if ($request->ajax()) {
            $inp_array=$request->input();
//поменять роль
     $del_role_user=DB::table('role_user')-> where('user_id', $inp_array['user'])
                ->delete();
     $del_user= DB::table('users')-> where('id', $inp_array['user'])
                ->delete();
    if($del_role_user && $del_user){
       echo json_encode('deleted'); 

    }
     else{ echo json_encode('not_deleted');}


        }

    }
}
