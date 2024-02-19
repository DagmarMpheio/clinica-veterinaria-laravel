<?php

namespace App\Http\Controllers\Backend;

use App\Models\Product;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ProductController extends AdminController
{
    protected $uploadPath;

    public function __construct()
    {
        parent::__construct();
        $this->uploadPath = 'img/products';
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderBy('name')->simplePaginate(5);
        $productsCount = Product::count();

        return view('backend.products.index', compact('products', 'productsCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $product = new Product();

        return view('backend.products.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'price' => 'required',
            'stock' => 'required',
            'image' => 'file|mimes:jpeg,png,jpg,gif,svg|max:81920',
        ]);

        //$data = $request->all();
        $data = $this->handleResquest($request);

        $product = Product::create($data);

        //return dd($request->role);
        return redirect('/backend/products')->with("message", "Novo produto inserido com sucesso!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('backend.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'price' => 'required',
            'stock' => 'required',
            'image' => 'file|mimes:jpeg,png,jpg,gif,svg|max:81920',
        ]);

        $oldImage = $product->image;

        $data = $this->handleResquest($request);

        $product->update($data);

        if ($oldImage !== $product->image) {
            $this->removeImage($oldImage);
        }

        return redirect('/backend/products')->with("message", "Produto actualizado com sucesso!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $this->removeImage($product->image); //remove a imagem da bd e do servidor

        //apagar o produto
        $product->delete();

        return redirect("/backend/products")->with("message", "Usuário foi excluído com succeso!");
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
