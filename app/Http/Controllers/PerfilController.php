<?php

namespace App\Http\Controllers;

use App\Perfil;
use App\Receta;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PerfilController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth',['except'=>'show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function show(Perfil $perfil)
    {
        //Obtener las recetas con paginacion
        $recetas = Receta::where('user_id',$perfil->user_id)->paginate(10);
        return view('perfiles.show',compact('perfil','recetas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function edit(Perfil $perfil)
    {
        //ejecutar policy
        $this->authorize('view',$perfil);
        return view('perfiles.edit',compact('perfil'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perfil $perfil)
    {
        //ejecutar policy
        $this->authorize('update',$perfil);

        //Valida
        $data = request()->validate([
            'nombre'=>'required',
            'url'=>'required',
            'biografia'=>'required',
        ]);

        //Si el usuario sube una imagen
            if($request['imagen']){
                $ruta_imagen = $request['imagen']->store('upload-perfiles','public');

                //resize de la imagen
                $img = Image::make(public_path("storage/{$ruta_imagen}"))->fit(600,600);
                $img->save();

                //crear un arreglo de imagen
                $array_imagen = ['imagen'=>$ruta_imagen];
            }
        //Asignar nombre y URL
        auth()->user()->url = $data['url'];
        auth()->user()->name = $data['nombre'];
        auth()->user()->save();
        //Eliminar url y name de $data
        unset($data['url']);
        unset($data['nombre']);
        //Guardar Informacio
        auth()->user()->perfil()->update(
            array_merge(
                $data,
                $array_imagen ?? []
            )
        );
        //Redireccionar
        return redirect()->action('RecetaController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perfil $perfil)
    {
        //
    }
}
