<?php namespace App\Controllers;
use App\Models\PostModel;
use CodeIgniter\Files\File;
class Post extends BaseController{

    public function create(){
        if($this->request->getMethod() !== 'post'){
            return view('posts/create');
        }
       
        $file = new File($this->request->getFile('thumbnail'));
        $ext = $file->guessExtension();
        $save = $file->move(WRITEPATH.'uploads',$file->getRandomName()."{$ext}");
        $fields = [
            'title' => 'required|min_length[5]|max_length[255]',
            'body' => 'required',
            'thumbnail' => 'required',
        ];
        $validated = $this->validate($fields);
        if(!$validated){
            return view('posts/create');
        }

        $model = new PostModel();
        $insert = $model->insert([
            'title' => $this->request->getPost('title'),
            'slug'  => url_title($this->request->getPost('title'),'-',true),
            'body'  => $this->request->getPost('body'),
            'thumbnail' => $save->getBasename(),
        ]);
        if($insert){
            return redirect('posts/create')->with('message','Post Added Successfully');
        }else{
            return redirect('posts/create')->withInput();
        }

    }
}