<?php namespace App\Controllers;
use App\Models\PostModel;
use CodeIgniter\Files\File;
class PostController extends BaseController{
    protected $model =null;
    public function __construct(){
        $this->model = new PostModel();
    }
    public function index()
	{
        $data['posts'] = $this->model->getPosts(); 
		return view("posts/index",$data);
	}
    public function create(){
        if($this->request->getMethod() !== 'post'){
            return view('posts/create');
        }
       
        $file = new File($this->request->getFile('thumbnail'));
        $ext = $file->guessExtension();
        $save = $file->move(WRITEPATH.'uploads',$file->getRandomName().".{$ext}");
        $fields = [
            'title' => 'required|min_length[5]|max_length[255]',
            'body' => 'required',
           // 'thumbnail' => 'required',
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
            return redirect('post')->with('message','Post Added Successfully');
        }else{
            return redirect('posts/create')->withInput();
        }

    }
    public function show($id){
        $db  = \Config\Database::connect();
        $post = $db->table('posts')->where('id', $id)->get();
        $post = $post->getResult();
        return view('posts/post',['data'=>$post]);
        /*
        $data['post'] = $this->model->getPost($id);
        dd($data);
        return view('posts/post', $data);
        */
    }
    public function edit($id){
        $data['post'] = $this->model->getPost($id);
        //dd($data);
        return view('posts/edit', $data);
    }
    public function delete($id){
        $deleted = $this->model->where('id', $id)->delete();
        if($deleted){
            return redirect('post')->with('message','Deleted Successfully');
        }else{
            return redirect('post')->with('message','Not Deleted');
        }
    }

    public function search(){
        $data['posts'] = $this->model->searchPost($this->request->getGet('s'));
        return view("posts/index",$data);

    }
    public function sendEmail()
    {
            $email = \Config\Services::email();

            $email->setFrom('def70ad2c0-b8e5c5@inbox.mailtrap.io', 'TechBlogger');
            $email->setTo($this->request->getVar('email'));

            $email->setSubject('TechBlogger');
            $email->setMessage($this->request->getVar('message'));

            $email->send();
            return redirect()->to('/');
    }
}