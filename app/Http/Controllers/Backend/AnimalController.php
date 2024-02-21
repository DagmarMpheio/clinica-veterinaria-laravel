<?php

namespace App\Http\Controllers\Backend;

use App\Models\Animal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class AnimalController extends AdminController
{
    protected $uploadPath;

    public function __construct()
    {
        parent::__construct();
        $this->uploadPath = 'img/animals';
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //mostrar os animais de acordo com nivel de accesso
        if (Auth::user()->hasRole('admin')) {
            $animals = Animal::orderBy('name')->simplePaginate(5);
            $animalsCount = Animal::count();
        } else {

            $animals = Animal::where('owner_id', auth()->user()->id)->orderBy('name')->simplePaginate(5);
            $animalsCount = Animal::where('owner_id', auth()->user()->id)->count();
        }

        return view('backend.animals.index', compact('animals', 'animalsCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $animal = new Animal();

        return view('backend.animals.create', compact('animal'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'specie' => 'required|string',
            'race' => 'required|string',
            'image' => 'file|mimes:jpeg,png,jpg,gif,svg|max:81920',
        ]);

        $data = $this->handleResquest($request);

        //$animal = Animal::create($data);
        $newAnimal = $request->user()->animals()->create($data);

        //return dd($request->role);
        return redirect('/backend/animals')->with("message", "Animal cadastrado com sucesso!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Animal $animal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Animal $animal)
    {
        return view('backend.animals.edit', compact('animal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Animal $animal)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'specie' => 'required|string',
            'race' => 'required|string',
            'image' => 'file|mimes:jpeg,png,jpg,gif,svg|max:81920',
        ]);

        $oldImage = $animal->image;

        $data = $this->handleResquest($request);

        $animal->update($data);

        if ($oldImage !== $animal->image) {
            $this->removeImage($oldImage);
        }

        return redirect('/backend/animals')->with("message", "Animal actualizado com sucesso!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Animal $animal)
    {
        $this->removeImage($animal->image); //remove a imagem da bd e do servidor

        //apagar o produto
        $animal->delete();

        return redirect("/backend/animals")->with("message", "Animal foi excluído com succeso!");
    }

    private function handleResquest(Request $request)
    {
        $dados = $request->all(); //pegar todos os dados inseridos pelo usuario

        /*se o usuario se inseriu um ficheiro, faça:*/
        if ($request->hasFile('image')) {
            $image = $request->file('image'); //pega o ficheiro
            $fileName = time() . '.' . $image->getClientOriginalExtension(); //pegar o nome e a extensao do

            // create image manager with desired driver
            $manager = new ImageManager(new Driver());

            // read image from file system
            $imageToProcess = $manager->read($image->getRealPath());

            //$imageResize = Image::make($image->getRealPath())->orientate();
            $imageResize = $imageToProcess->resize(300, 300);

            /*nome temporario */
            $destination = $this->uploadPath; //pasta destino da imagem
            $imageResize->toPng()->save($destination . '/' . $fileName); //mover a imagem

            //preencher o campo com a imagem
            $dados['image'] = $fileName; //substituir os dados do campo image com os dados actual
        }

        return $dados;
    }

    //eliminar as imagens
    public function removeImage($image)
    {

        if (!empty($image)) {
            $imagePath = $this->uploadPath . '/' . $image;
            $ext = substr(strchr($image, '.'), 1); //extensao das imagens
            $thumbnail = str_replace(".{$ext}", "_thumb.{$ext}", $image);
            $thumbnailPath = $this->uploadPath . '/' . $thumbnail;

            if (file_exists($imagePath)) unlink($imagePath);
            if (file_exists($thumbnailPath)) unlink($thumbnailPath);
        }
    }
}
