<?php
namespace App\Http\Controllers;
use App\Models\produto;
use Illuminate\Http\Request;
class ProdutosController extends Controller
{
    public function index(){
        $produtos = produto::orderby('id','desc')->paginate();
        return view('produtos.index',['produtos'=> $produtos]);
    }
    public function create(){
        return view('produtos.create');
    }
    public function show($id){
        $produto = produto::find($id);
        return view('produtos.show',['produto'=>$produto]);
    }
    public function edit (produto $produto){
        return view ('produtos.edit',['produto'=> $produto]);
    }
    public function delete (produto $produto){
        return"teste";
    }


    public function insert(Request $request){
        $produto = new produto();
        $produto->nome = $request->nome;
        $produto->valor = $request->valor;
        $produto->descricao = $request->descricao;
        $produto-> save();
        return redirect()->route('produtos');
    }
    
    public function editar(Request $request, produto $produto){
        $produto->nome = $request->nome;
        $produto->valor = $request->valor;
        $produto->descricao = $request->descricao;
        $produto-> save();
        return redirect()->route('produtos');
    }
}
