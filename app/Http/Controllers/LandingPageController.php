<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Faq;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index(){
        $berita = Berita::where('publish', 'Ya')->orderBy('id', 'desc')->get();
        if(count(Faq::all())>10){
            $faq = Faq::all()->random(10);
        } else {
            $faq = Faq::all();
        }
        return view('welcome', ['berita' => $berita, 'faq' => $faq]);
    }

    public function faq(){
        $faq = Faq::all();
        return view('faq', ['faq' => $faq]);
    }
    
    public function berita(Request $request){
        // $berita = Berita::where('publish', 'Ya')->orderBy('id', 'desc')->paginate(5);
        // $rekomendasi = Berita::where('publish', 'Ya')->orderBy('id', 'desc')->inRandomOrder()->limit(5)->get();
        // return view('berita.index', ['berita' => $berita, 'rekomendasi' => $rekomendasi]);
        
        $search = $request->search;
        if ($search == true) {
            $berita = Berita::where('publish', 'Ya')->where('judul', 'like', "%".$search."%")->orWhere('isi', 'like', "%".$search."%")->orderBy('id', 'desc')->get();
        } else {
            $berita = Berita::where('publish', 'Ya')->orderBy('id', 'desc')->paginate(10);
        }
        $rekomendasi = Berita::where('publish', 'Ya')->orderBy('id', 'desc')->inRandomOrder()->limit(5)->get();
        return view('berita.index', ['berita' => $berita, 'rekomendasi' => $rekomendasi, 'search' => $search]);
    }

    public function beritaShow($slug){
        $berita = Berita::where('slug', $slug)->where('publish', 'ya')->where('publish', 'Ya')->orderBy('id', 'desc')->firstOrFail();
        $rekomendasi = Berita::where('publish', 'Ya')->orderBy('id', 'desc')->inRandomOrder()->limit(5)->get();
        return view('berita.show', ['berita' => $berita, 'rekomendasi' => $rekomendasi]);
    }
}
