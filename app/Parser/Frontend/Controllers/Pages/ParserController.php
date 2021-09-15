<?php


namespace App\Parser\Frontend\Controllers\Pages;


use App\Core\Abstracts\Controllers\FrontendController;
use App\Parser\Core\Models\Games;
use Illuminate\Http\Request;

class ParserController extends FrontendController
{
    public function newParsing()
    {
        return view('frontend::pages/parser/new-parsing');
    }

    public function parsedData()
    {
        return view('frontend::pages/parser/parsed-data');
    }

    public function edit(int $id)
    {
        $game = Games::where('id', $id)->first();

        return view('frontend::pages/parser/edit', compact('game'));
    }

    public function update(int $id, Request $request)
    {
        $result = Games::where('id', $id)->update([
            'name'              => ucwords(strtolower($request->name)),
            'slug'              => $request->slug ?: \Str::slug($request->name),
            'description'       => $request->description,
            'img_prewie'        => $request->img_prewie,
            'img_art'           => $request->img_art,
            'img_with_title'    => $request->img_with_title,
        ]);

        return redirect()->route('parser.parsed-data.edit', $id);
    }
}
