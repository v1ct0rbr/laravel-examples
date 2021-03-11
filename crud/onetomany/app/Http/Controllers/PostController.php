<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use Exception;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('post-list', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $validated = $request->validate(['']);
        try {
            $post = new Post(['title' => $request->title, 'content' => $request->content]);
            $post->save();
            return redirect()->route('posts.edit', ['post' => $post->id])->with('success', 'Cadastrado com sucesso');
        } catch (Exception $e) {
            return back()->with('error', [['title' => 'erro no cadastro', 'details' => $e->getMessage()]]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('post-details', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        return view('post-edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePostRequest $request, $id)
    {
        //
        error_log($request->id);
        $validated = $request->validate([$id]);
        try {
            $updatePost = Post::findOrFail($id);
            $updatePost->update(['title' => $request->title, 'content' => $request->content]);
            return redirect()->route('posts.edit', ['post' => $updatePost->id])->with('success', 'Atualizado com sucesso');
        } catch (Exception $e) {
            return back()->with('error', [['title' => 'erro na atualização', 'details' => $e->getMessage()]]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {
            $result = Post::destroy($id);
            if ($result)
                return redirect()->route('posts.index')->with('success', 'Excluído com sucesso');
            else {
                return back()->with('error', [['title' => 'Item não excluído', 'details' => 'Tente novamento mais tarde']]);
            }
        } catch (Exception $e) {
            return back()->with('error', [['title' => 'erro na exclusão', 'details' => $e->getMessage()]]);
        }
    }
}
