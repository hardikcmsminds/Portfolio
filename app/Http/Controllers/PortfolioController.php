<?php
namespace App\Http\Controllers;
use App\Portfolio;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use Session;
use App\Item;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Facades\Input;
class PortfolioController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth:admin');
    } 
    public function index(){
        $data = array();
        $data['page'] = 'portfolio';
        $data['portfolios'] = DB::select('select portfolio.*,technology.technology_name from portfolio left join technology on technology.technology_id = portfolio.technology order by portfolioid desc');
        return view('admin/portfolio/portfolio',$data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){ 
        if ($request->isMethod('post')) {
            $title = $request->input('name');
            $client = $request->input('client_name');
            $technology = $request->input('technology'); 
            $content =  addslashes($request->input('content')); 
            $site_link =  $request->input('site_link');
            $display_index = $request->input('display_index');
            $web_server = $request->input('web_server');
            $theme = $request->input('theme');
            $multi_theme = $request->input('multi_theme');
            $multi_site = $request->input('multi_site');
            $duration = $request->input('duration');
            $addons = $request->input('addons');
            $status = $request->input('status')=='0' ? '0' : '1';
            $notes = $request->input('notes');
            $this->validate($request,[
                'name' => 'required',
                'technology' => 'required',
                'display_index' => 'required|unique:portfolio',
                'content' => 'required',
                'site_link' => 'required',
                'tags'  => 'required',
                'duration' => 'required'
            ]);
            $filename = '';
            $category = " ";
            $tags = " ";
            $js_css_package = " ";
            $payment_method = " ";
            if($request->input('category')){
                $category = implode(",", $request->input('category'));
            }
            if($request->input('tags')){
                $tags =  implode(",", $request->input('tags'));
            }
            if($request->input('js_css_package')){
                $js_css_package = implode(",", $request->input('js_css_package'));
            }
            if($request->input('payment_method')){
                $payment_method = implode(",", $request->input('payment_method'));
            }
            if($request->file('image') != ''){
                $file = $request->file('image')->getClientOriginalName(); 
                $extension = explode(".", $file);
                $filename = date('ymdhis').".".$extension[1];
                $request->file('image')->move('template/frontend/images/', $filename);
            } 
            $id = DB::table('portfolio')->insertGetId(['title' => $title,'client_name' => $client,'category' => $category,'technology' => $technology,'content' => $content,'site_link'=>$site_link,'image'=>$filename,'tags'=>$tags,'display_index'=>$display_index, 'web_server' => $web_server, 'theme' => $theme, 'js_css_packages' => $js_css_package, 'payment_methods' => $payment_method, 'multi_theme' => $multi_theme, 'multi_sites' => $multi_site, 'duration' => $duration, 'addons' => $addons, 'status' => $status, 'notes' => $notes]);
            Session::flash('message', 'Portfolio added successfully.');
            return redirect('admin/portfolio')->withInput();
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function show(Portfolio $portfolio){
        $data = array();
        $data['page'] = 'portfolio';
        $data['categories'] = DB::select('select * from category');
        $data['technologies'] = DB::select('select * from technology');
        $data['servers'] = DB::select('select * from server');
        $data['themes'] = DB::select('select * from theme');
        $data['packages'] = DB::select('select * from package');
        $data['payments'] = DB::select('select * from payment');
        $data['tag'] = DB::select('select * from tag');
        $data['displayindex'] = DB::select('select * from portfolio order by display_index DESC LIMIT 1');
        return view('admin/portfolio/add',$data);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $data = array();
        $data['results'] = DB::select('select * from portfolio where portfolioid = '.$id);
        $data['categories'] = DB::select('select * from category');
        $data['technologies'] = DB::select('select * from technology');
        $data['servers'] = DB::select('select * from server');
        $data['themes'] = DB::select('select * from theme');
        $data['packages'] = DB::select('select * from package');
        $data['payments'] = DB::select('select * from payment');
        $data['tag'] = DB::select('select * from tag');
        $data['page'] = 'portfolio';
        return view('admin/portfolio/edit',$data);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Portfolio $portfolio){
        if ($request->isMethod('post')) {
            $portfolio = Portfolio::find($request->input('id'));
            $date = date('Y-m-d');
            $title = $request->input('name');
            $client = $request->input('client_name'); 
            $technology = $request->input('technology'); 
            $category = "";
            $tags = "";
            $js_css_package = "";
            $payment_method = "";
            if($request->input('category')){
                $category =  implode(",", $request->input('category'));
            }
            $content =  addslashes($request->input('content')); 
            $id =  $request->input('id'); 
            $site_link =  rtrim($request->input('site_link'),'/'); 
            $filename = '';
            if($request->input('tags')){
                $tags =  implode(",", $request->input('tags'));
            }
            $display = $request->input('display_index');
            $web_server = $request->input('web_server');
            $theme = $request->input('theme');
            if($request->input('js_css_package')){
                $js_css_package = implode(",", $request->input('js_css_package'));
            }
            if($request->input('payment_method')){
                $payment_method = implode(",", $request->input('payment_method'));
            }
            $multi_theme = $request->input('multi_theme');
            $multi_site = $request->input('multi_site');
            $duration = $request->input('duration');
            $addons = $request->input('addons');
            $status = $request->input('status')=='0' ? '0' : '1';
            $notes = $request->input('notes');
            $this->validate($request,[
                'name' => 'required',
                'category' => 'required',
                'technology' => 'required',
                'display_index' => 'required',
                'content' => 'required',
                'site_link' => 'required',
            ]);
            if($request->has('old_image')){
                $oldimage = $request->input('old_image');
                if($oldimage==''){
                    if($portfolio->image!='' and $portfolio->image!='no-image-icon-15.png' and $portfolio->image!='No_img_portfolio.jpg'){
                        $file_path = base_path('/template/frontend/images/'.$portfolio->image);
                        if(file_exists($file_path)){
                            unlink($file_path);
                        }
                    }
                }
            }
            if($request->file('image') != ''){
                $file = $request->file('image')->getClientOriginalName();
                $extension = explode(".", $file);
                $filename = date('ymdhis').".".$extension[1];
                $request->file('image')->move('template/frontend/images/', $filename);
                $filename = ',`image`  = "'.$filename.'"';
            }
            $query = DB::update('UPDATE `portfolio` SET `title` = "'.$title.'",`client_name` = "'.$client.'", `category` ="'.$category.'", `technology` ="'.$technology.'", `tags` ="'.$tags.'", `content` = "'.$content.'", `site_link` = "'.$site_link.'" '.$filename.' , `display_index` ="'.$display.'", `web_server` ="'.$web_server.'", `theme` ="'.$theme.'", `js_css_packages` ="'.$js_css_package.'", `payment_methods` ="'.$payment_method.'", `multi_theme` ="'.$multi_theme.'", `multi_sites` ="'.$multi_site.'", `duration` = "'.$duration.'", `addons` ="'.$addons.'", `status` ="'.$status.'", `notes` ="'.$notes.'", `updated_at` = "'.$date.'" WHERE `portfolioid` = '.$id);
           Session::flash('message', 'Portfolio updated successfully.');
           return redirect('admin/portfolio');         
        } 
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){ 
        $query1 = DB::select('select * from portfolio where portfolioid = '.$id);
        foreach($query1 as $imagedata){
            $imagename = $imagedata->image;
         if (file_exists(base_path().'/template/frontend/images/'.$imagename) && !empty($imagename) && $imagename!='' && $imagename!='No_img_portfolio.jpg' && $imagename!='no-image-icon-15.png') {
            $file_path = base_path().'/template/frontend/images/'.$imagename;
            unlink($file_path);
         }
        }
        $query = DB::table('portfolio')->where('portfolioid', '=', $id)->delete();
        Session::flash('message', 'Portfolio deleted successfully.');
        return redirect('admin/portfolio');
    }
    public function sortindex(){
        $data = array();
        $data['page'] = 'portfolioindex';
        $data['sortindex'] = DB::select('SELECT * FROM portfolio ORDER BY display_index ASC');
        return view('admin/portfolio/sortindex',$data);
    }
    public function sortupdate(Request $request){
        $array = $request->input('arrayindex'); 
        $count = 1;
        foreach ($array as $idval) {
            $query = DB::update('UPDATE `portfolio` SET `display_index` ="'.$count.'" WHERE `portfolioid` = '.$idval);
            $count ++;
        }
        $data = array();
        $data['page'] = 'portfolioindex';
        $data['sortindex'] = DB::select('SELECT portfolioid,display_index,technology,title FROM portfolio ORDER BY display_index ASC');
        return response ()->json ($data['sortindex']);
    }
    public function downloadExcel($type){
        $data = array();
        $data['portfolio'] = DB::select('SELECT p.*,technology.technology_name as technology_name,server.server_name as server_name,theme.theme_name as theme_name,(SELECT GROUP_CONCAT(category_name) FROM category  WHERE FIND_IN_SET(category_id,p.category)) as category_names,(SELECT GROUP_CONCAT(tag_name) FROM tag WHERE FIND_IN_SET(tag_id,p.tags)) as tag_names,(SELECT GROUP_CONCAT(package_name) FROM package WHERE FIND_IN_SET(package_id,p.js_css_packages)) as package_names,(SELECT GROUP_CONCAT(payment_name) FROM payment WHERE FIND_IN_SET(payment_id,p.payment_methods)) as payment_names FROM portfolio as p LEFT JOIN technology ON technology.technology_id = p.technology LEFT JOIN server ON server.server_id = p.web_server LEFT JOIN theme ON theme.theme_id = p.theme');
        $data['category'] = DB::select('SELECT * FROM category ');
        $data['technology'] = DB::select('SELECT * FROM technology ');
        $data['tag'] = DB::select('SELECT * FROM tag ');
        $data['server'] = DB::select('SELECT * FROM server ');
        $data['theme'] = DB::select('SELECT * FROM theme ');
        $data['package'] = DB::select('SELECT * FROM package ');
        $data['payment'] = DB::select('SELECT * FROM payment ');
        return Excel::create('portfolio'.date('Y-m-d-h-i-s'), function($excel) use ($data) {
            $excel->sheet('portfolio', function($sheet) use ($data){
                $sheet->loadView('admin.portfolio.export')->with([
                    'portfolio' => $data
                ]);
            });
            $excel->sheet('category', function($sheet) use ($data){
                $sheet->loadView('admin.portfolio.category')->with([
                    'category' => $data
                ]);
            });
            $excel->sheet('technology', function($sheet) use ($data){
                $sheet->loadView('admin.portfolio.technology')->with([
                    'technology' => $data
                ]);
            });
            $excel->sheet('tag', function($sheet) use ($data){
                $sheet->loadView('admin.portfolio.tag')->with([
                    'tag' => $data
                ]);
            });
            $excel->sheet('server', function($sheet) use ($data){
                $sheet->loadView('admin.portfolio.server')->with([
                    'server' => $data
                ]);
            });
            $excel->sheet('theme', function($sheet) use ($data){
                $sheet->loadView('admin.portfolio.theme')->with([
                    'theme' => $data
                ]);
            });
            $excel->sheet('package', function($sheet) use ($data){
                $sheet->loadView('admin.portfolio.package')->with([
                    'package' => $data
                ]);
            });
            $excel->sheet('payment', function($sheet) use ($data){
                $sheet->loadView('admin.portfolio.payment')->with([
                    'payment' => $data
                ]);
            });
            $excel->sheet('multi_theme', function($sheet) use ($data){
                $sheet->loadView('admin.portfolio.multitheme');
            });
            $excel->sheet('multi_site', function($sheet) use ($data){
                $sheet->loadView('admin.portfolio.multisite');
            });
        })->download('xlsx');
    }
    private function getCurlImage($url){
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);        
        curl_setopt($ch, CURLOPT_MAXREDIRS, 2); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $content = curl_exec($ch);
        curl_close($ch);
        return $content;
    }
    public function importfile(Request $request){
        $rules = array(
            'file' => 'required'
        );
        $messages = array(
            'file.required' => 'Please select file'
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Please select file to import.');
        }
        $file = request()->file('file');
        $path = $file->getRealPath();
        $extension = $file->getClientOriginalExtension();
        $extension_array = ['xlsx','csv','xls'];
        if(!in_array($extension, $extension_array)){
            return redirect()->back()->with('error', 'You can only upload excel and csv file.');
        }
        $data = Excel::load($path, function($reader) {})->get();
        if(empty($data) || $data->count() < 1) return redirect()->back()->with('error', 'The system encountered an error while importing the data. Please try again.');
        foreach($data as $newdata) {
            $sheetTitle = $newdata->getTitle();
            if($sheetTitle == 'portfolio'){
                foreach($newdata as $portdata){
                    $portfolioid = $portdata['portfolioid'];
                    if($portfolioid){
                        $title = $portdata['title'];
                        $client_name = $portdata['client_name'];
                        $content = $portdata['content'];
                        $content = trim($content,'"');
                        $content = addslashes($content);
                        $category_names = $portdata['category'];
                        $category = '';
                        if($category_names){
                            $categories = [];
                            $exploded_category_names = explode(',',$category_names);
                            foreach($exploded_category_names as $category_name) {
                                $query = DB::select("select * from category where category_name = '".trim($category_name)."'");
                                if(count($query)>0){
                                    $categories[] = $query[0]->category_id;
                                }else{
                                    $categories[] = DB::table('category')->insertGetId(['category_name'=>$category_name,'parent_id'=>'0','created_date'=>date('Y-m-d H:i:s')]);
                                }
                            }
                            $category = implode(',',$categories);
                        }
                        $technology_names = $portdata['technology'];
                        $technology = '';
                        if($technology_names){
                            $technologies = [];
                            $exploded_technology_names = explode(',',$technology_names);
                            foreach($exploded_technology_names as $technology_name) {
                                $query = DB::select("select * from technology where technology_name = '".trim($technology_name)."'");
                                if(count($query)>0){
                                    $technologies[] = $query[0]->technology_id;
                                }else{
                                    $technologies[] = DB::table('technology')->insertGetId(['technology_name'=>$technology_name,'parent_id'=>'0','created_date'=>date('Y-m-d H:i:s'),'indexes'=>'0']);
                                }
                            }
                            $technology = implode(',',$technologies);
                        }
                        $tag_names = $portdata['tags'];
                        $tags = '';
                        if($tag_names){
                            $tagss = [];
                            $exploded_tag_names = explode(',',$tag_names);
                            foreach($exploded_tag_names as $tag_name) {
                                $query = DB::select("select * from tag where tag_name = '".trim($tag_name)."'");
                                if(count($query)>0){
                                    $tagss[] = $query[0]->tag_id;
                                }else{
                                    $tagss[] = DB::table('tag')->insertGetId(['tag_name'=>$tag_name,'created_date'=>date('Y-m-d H:i:s')]);
                                }
                            }
                            $tags = implode(',',$tagss);
                        }
                        $web_server_names = $portdata['web_server'];
                        $web_server = '';
                        if($web_server_names){
                            $servers = [];
                            $exploded_web_server_names = explode(',',$web_server_names);
                            foreach($exploded_web_server_names as $server_name) {
                                $query = DB::select("select * from server where server_name = '".trim($server_name)."'");
                                if(count($query)>0){
                                    $servers[] = $query[0]->server_id;
                                }else{
                                    $servers[] = DB::table('server')->insertGetId(['server_name'=>$server_name,'created_date'=>date('Y-m-d H:i:s')]);
                                }
                            }
                            $web_server = implode(',',$servers);
                        }
                        $theme_names = $portdata['theme'];
                        $theme = '';
                        if($theme_names){
                            $themes = [];
                            $exploded_theme_names = explode(',',$theme_names);
                            foreach($exploded_theme_names as $theme_name) {
                                $query = DB::select("select * from theme where theme_name = '".trim($theme_name)."'");
                                if(count($query)>0){
                                    $themes[] = $query[0]->theme_id;
                                }else{
                                    $themes[] = DB::table('theme')->insertGetId(['theme_name'=>$theme_name,'created_date'=>date('Y-m-d H:i:s')]);
                                }
                            }
                            $theme = implode(',',$themes);
                        }
                        $js_css_package_names = $portdata['js_css_packages'];
                        $js_css_packages = '';
                        if($js_css_package_names){
                            $packages = [];
                            $exploded_package_names = explode(',',$js_css_package_names);
                            foreach($exploded_package_names as $package_name) {
                                $query = DB::select("select * from package where package_name = '".trim($package_name)."'");
                                if(count($query)>0){
                                    $packages[] = $query[0]->package_id;
                                }else{
                                    $packages[] = DB::table('package')->insertGetId(['package_name'=>$package_name,'created_date'=>date('Y-m-d H:i:s')]);
                                }
                            }
                            $js_css_packages = implode(',',$packages);
                        }
                        $payment_method_names = $portdata['payment_methods'];
                        $payment_methods = '';
                        if($payment_method_names){
                            $payments = [];
                            $exploded_payment_method_names = explode(',',$payment_method_names);
                            foreach($exploded_payment_method_names as $payment_name) {
                                $query = DB::select("select * from payment where payment_name = '".trim($payment_name)."'");
                                if(count($query)>0){
                                    $payments[] = $query[0]->payment_id;
                                }else{
                                    $payments[] = DB::table('payment')->insertGetId(['payment_name'=>$payment_name,'created_date'=>date('Y-m-d H:i:s')]);
                                }
                            }
                            $payment_methods = implode(',',$payments);
                        }
                        $multi_theme = $portdata['multi_theme'];
                        $multi_sites = $portdata['multi_sites'];
                        $duration = $portdata['duration'];
                        $addons = $portdata['addons'];
                        $site_link = $portdata['site_link'];
                        $image = basename($portdata['image']);
                        $image_url = $this->getCurlImage($portdata['image']);
                        if($image_url){
                            file_put_contents(base_path('template/frontend/images/'.$image), $image_url);
                        }
                        $display_index = $portdata['display_index'];
                        $date = date('Y-m-d H:i:s');
                        $query1 = DB::select('select * from portfolio where portfolioid = '.$portfolioid);

                        $countdata = count($query1);
                        if($countdata>0){
                           $query = DB::update('UPDATE `portfolio` SET `title` = "'.$title.'",`client_name` = "'.$client_name.'", `category` ="'.$category.'", `technology` ="'.$technology.'", `tags` ="'.$tags.'", `content` = "'.$content.'", `site_link` = "'.$site_link.'" ,`image` = "'.$image.'", `display_index` ="'.$display_index.'", `web_server` ="'.$web_server.'", `theme` ="'.$theme.'", `js_css_packages` ="'.$js_css_packages.'", `payment_methods` ="'.$payment_methods.'", `multi_theme` ="'.$multi_theme.'", `multi_sites` ="'.$multi_sites.'", `duration` = "'.$duration.'", `addons` ="'.$addons.'", `updated_at` = "'.$date.'" WHERE `portfolioid` = '.$portfolioid);
                        }else{
                            $id = DB::table('portfolio')->insertGetId(
                                    ['title' => $title,'client_name' => $client_name,'category' => $category,'technology' => $technology,'content' => $content,'site_link'=>$site_link,'image'=>'No_img_portfolio.jpg','tags'=>$tags,'display_index'=>$display_index, 'web_server' => $web_server, 'theme' => $theme, 'js_css_packages' => $js_css_packages, 'payment_methods' => $payment_methods, 'multi_theme' => $multi_theme, 'multi_sites' => $multi_sites, 'duration' => $duration, 'addons' => $addons]); 
                        }
                    }
                }
            }elseif($sheetTitle != 'category' && $sheetTitle != 'technology' && $sheetTitle != 'tag' && $sheetTitle != 'server' && $sheetTitle != 'theme' && $sheetTitle != 'package' && $sheetTitle != 'payment' && $sheetTitle != 'multi_theme' && $sheetTitle != 'multi_site'){
                return redirect()->back()->with('error', 'Portfolio sheet not found.');
            }
        }
        return redirect()->back()->with('message', 'Portfolio Updated Successfully.');
    }
    public function removeImage(Request $request){
        $portfolio = Portfolio::find($request->id);
        if($portfolio){
            $file_path = base_path('/template/frontend/images/'.$portfolio->image);
            if(file_exists($file_path)){
                unlink($file_path);
                $portfolio->image = '';
                $portfolio->save();
                $response = ['status'=>200,'message'=>'File deleted successfully'];
            }else{
                $response = ['status'=>201,'message'=>'File not exist'];
            }
        }else{
            $response = ['status'=>201,'message'=>'Portfolio not found'];
        }
        return json_encode($response);
    }
}