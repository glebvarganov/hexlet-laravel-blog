<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;


class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::orderBy('id', 'desc')->paginate(10);
        return view('page.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page = new Page();
        return view('page.create', compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'title' => 'required|max:250|unique:pages',
            'body' => 'required|min:100',
            'status' => [
                'required',
                Rule::in(['draft', 'published']),
            ],
        ]);

        $page = new Page();
        $page->fill($data);
        $page->save();
        \Session::flash('flash_message', 'Your page has been created!');
        return redirect()->route('pages.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        $page = Page::findOrFail($page->id);
        return view('page.show', compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        $page = Page::findOrFail($page->id);
        return view('page.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        $page = Page::findOrFail($page->id);
        $data = $this->validate($request, [
            'title' => 'required|max:250|unique:pages,title,' . $page->id,
            'body' => 'required|min:100',
            'status' => [
                'required',
                Rule::in(['draft', 'published']),
            ],
        ]);
        $page->fill($data);
        $page->save();

        \Session::flash('flash_message', 'Your page has been updated!');

        return redirect()
            ->route('pages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        $page = Page::find($page->id);
        if ($page) {
            $page->delete();
            \Session::flash('flash_message', 'Your page has been deleted!');
        }
        return redirect()->route('pages.index');
    }
}
