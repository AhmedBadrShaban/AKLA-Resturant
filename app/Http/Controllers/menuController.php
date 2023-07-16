<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meal;
use App\Models\Type;

class menuController extends Controller
{
    //
    public function showMeal($id=null){
        //show a specific meal
        return $id?view('meal',[
            'meal' => Meal::where('id',$id)->firstOrFail()
        ]):view('menu',[
            'meals' =>Meal::all(),
            'types' =>Type::all(),
        ]);
    }

    public function showMealAdmin($id=null){
        //show a specific meal
        return $id?view('mealAdmin',[
            'meal' =>Meal::where('id',$id)->firstOrFail()
        ]): view('menuAdmin',[
            'meals' =>Meal::all(),
            'types' =>Type::all(),
        ]);
    }

    public function create(){
        //create a new meal item
        return view('addMeals',[
            'types' =>Type::all(),
        ]);
    }


    public function store(Request $request){
        //persist creating
        $meal              =  new Meal();
        $request->validate([
            'title'      =>['string','required','max:70'],
            'description'=>['string','required'],
            'price'      =>['numeric', 'required'],
            'photo' => 'required|image|mimes:jpg,png,jpeg,gif,svg,webp|max:2048',
        ]);

        $type = Type::where('type_name',request('type'))->firstOrFail();
        $type-> count = $type-> count+1;

        $meal->title       =  request('title');
        $meal->description =  request('description');
        $meal->price       =  request('price');
        $meal ->type_id       =  $type->id;


        if($request -> hasFile('photo'))
        {

            $imageName = time().$request->photo->getClientOriginalName();

            $request->photo->move(public_path('uploads'), $imageName);

            $meal->photo = 'uploads/'.$imageName;

        }
        $type -> save();
        $meal -> save();
        return redirect('/admin/menu');
    }

    public function addType(){
        return view('addType');
    }

    public function storeType(Request $request){

        $type              =  new Type();
        $request->validate([
            'type_name'      =>['string','required','max:20'],
        ]);

        $type->type_name       =  request('type_name');
        $type->count =0;

        $type -> save();
        return redirect('/admin/menu');
    }

    public function edit($id){
        //edit
        return view('updateMeal',[
            'meal' =>Meal::where('id',$id)->firstOrFail(),
            'types' =>Type::all(),
        ]);

    }

    public function update(Request $request,Meal $meal){
        //persist editing

        $attributes = request()->validate([
            'title'      => ['string', 'required', 'max:70'],
            'price'      => ['numeric', 'required'],
            'description'=> ['string', 'required'],
            'photo' => 'required|image|mimes:jpg,png,jpeg,gif,svg,webp|max:2048',
        ]);
        $type = Type::where('type_name',request('type'))->firstOrFail();
        //type has benn changed
        if($meal->type_id != $type->id){
            $old_type = Type::where('id',$meal->type_id)->firstOrFail();
            $old_type->count = $old_type->count - 1;
            $type ->count = $type->count + 1;
            $old_type -> save();
        }

        if($request -> hasFile('photo'))
        {

            $imageName = time().$request->photo->getClientOriginalName();

            $request->photo->move(public_path('uploads'), $imageName);

            $meal->photo = 'uploads/'.$imageName;

        }
        $type -> save();
        $meal -> save();
        return redirect('/admin/menu');
    }

    public function delete($id){
        return view('deleteMeal',[
            'meal' =>Meal::where('id',$id)->firstOrFail()
        ]);
    }

    public function destroy(Meal $meal)
    {
        $type =Type::where('type_name',$meal-> type)->firstOrFail();
        $type-> count = $type-> count - 1;
        $meal->delete();

        return redirect('/admin/menu/');

    }

    public function deleteType($id){
        return view('deleteType',[
            'type' =>Type::where('id',$id)->firstOrFail()
        ]);
    }

    public function destroyType(Type $type)
    {
        $type->delete();

        return redirect('/admin/menu/');

    }


}
