<?php
namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class BackEndController extends Controller {

    protected $model;
    public function __construct(Model $model)
    {
        $this->model = $model;
    }
    
    protected function getClassNameFromModel(){
        return str_plural(strtolower(class_basename($this->model)));
    }

    protected function pluralModelName(){
        return str_plural(class_basename($this->model));
    }

    public function index()
    {
        $page_title = $this->pluralModelName().' control';
        $nav_title = $this->pluralModelName();
        $modelName = strtolower(class_basename($this->model));
        $routeName = $this->getClassNameFromModel();

        $rows = $this->model;

        if(!empty($this->with())){
            $rows = $rows->with($this->with())->paginate(10);
            
        } else {
            $rows = $rows->paginate(10);
        }
        return view('back-end.'.$routeName.'.index',compact(
            'rows', 'page_title', 'nav_title', 'modelName','routeName'));
    }

    public function create(){

        $page_title = 'create '.strtolower(class_basename($this->model));
        $nav_title = $page_title;
        $routeName = $this->getClassNameFromModel();
        
        $append = $this->append();

        return view('back-end.'.$this->getClassNameFromModel().'.create',compact(
            'page_title', 'nav_title'))->with($append);
    }

    public function destroy($id){
        $user = $this->model::findOrFail($id)->delete();
        return redirect()->route($this->getClassNameFromModel().'.index');
    }

    
    public function edit($id){

        $page_title = 'Edit '.class_basename($this->model);
        $nav_title = $page_title;
        $row =$this->model::findOrFail($id);
        $append = $this->append();
        $youTubeId = $this->getYouTubeIdFromURL($row->youtube);
        return view('back-end.'.$this->getClassNameFromModel().'.edit', compact(
            'row','page_title', 'nav_title','youTubeId'))->with($append);
    }

    protected function with(){
        return [];
    }

    protected function append(){
        return [];
    }

    function getYouTubeIdFromURL($url)
    {
        $url_string = parse_url($url, PHP_URL_QUERY);
        parse_str($url_string, $args);
        return isset($args['v']) ? $args['v'] : false;
    }
}
