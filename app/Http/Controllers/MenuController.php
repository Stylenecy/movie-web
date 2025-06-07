<?php

namespace App\Http\Controllers;
use App\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use PhpParser\Builder\Function_;
use PhpParser\Node\Expr\FuncCall;
use Psy\Readline\Hoa\Console;
use Symfony\Component\VarDumper\Caster\RedisCaster;
use View;

class MenuController extends Controller
{
    public function main()
    {
        return view('main');
    }
    public function faq()
    {
        return view('faq');
    }
    public function home()
    {
        return view('home', ['key' => 'home']);
    }

    public function movie()
    {
        $movie = Movie::orderBy('id', 'desc')->get();
        return view('movie', ['key' => 'movie', 'mv' => $movie]);
    }
    public function addMovie()
    {
        $movie = Movie::all();
        return view('formmovie', ['key' => 'movie']);
    }

    public function kategori()
    {
        return view('kategori', ['key' => 'kategori']);
    }

    public function genre()
    {
        return view('genre');
    }

    public function savemovie(Request $request)
    {
        $path = null;
        if ($request->hasFile('poster')) {
            $file_name = time() . '-' . $request->file('poster')->getClientOriginalName();
            $path = $request->file('poster')->storeAs('poster', $file_name, 'public');
        } else {
            $path = 'poster/default.jpg';
        }
        Movie::create([
            'ImDB' => $request->ImDB,
            'title' => $request->title,
            'genre' => $request->genre,
            'year' => $request->year,
            'kategori' => $request->kategori,
            'poster' => $path
        ]);
        return redirect('/movie')->with('alert', 'Data Berhasil Disimpan ^_^<3');
    }

    public function editmovie($id)
    {
        $id = Movie::find($id);
        return view('editmovie', ['key' => 'movie', 'id_movie' => $id]);
    }

    public function updatemovie($id, Request $request)
    {
        $movie = Movie::find($id);
        $movie->ImDB = $request->ImDB;
        $movie->title = $request->title;
        $movie->genre = $request->genre;
        $movie->year = $request->year;

        if ($request->poster) {

            if ($request->hasFile('poster')) {
                if ($movie->poster) {
                    Storage::disk('public')->delete($movie->poster);
                    \Log::info("File deleted successfully.");
                }
                $file_name = time() . '-' . $request->file('poster')->getClientOriginalName();
                $path = $request->file('poster')->storeAs('poster', $file_name, 'public');
            } else {
                $path = $movie->poster;
            }
            $movie->save();
            return redirect('/movie')->with('alert', 'Data Berhasil Di-update ^_^<3');
        }
    }

    public function deletemovie($id)
    {
        // Mengambil ID Movie yang akan d hapus
        $mv = Movie::find($id);

        // Mengecek apakah ada poster dari data yang akan di hapus
        if ($mv->poster) {
            Storage::disk('public')->delete($mv->movie);
        }
        $mv->delete();
        return redirect('/movie')->with('alert', 'Data Berhasil Di-hapus >_<');
    }

    public function login()
    {
        return view('login');
    }

    public function ceklogin(Request $request)
    {
        if (!Auth::attempt([
            'username' => $request->username,
            'password' => $request->password,
        ]))
        {
            return redirect('/')->with('alert', 'Salah bos! Coba tes lagi 0_o');
        }
        else
        {
            return redirect('/home');
        }
    }

    public function ubahpass()
    {
        return view ('formpass', ['key' => '']);
    }

    public function updatepass(Request $request)
    {
        if($request->password == $request->konfirmasi_password)
        {
            $user = Auth::user();
            $user->password = bcrypt($request->password);
            $user->save();

            return redirect('/ubahpass')->with('info', 'Password Berhasil Di-ubah ^_^!');
        }
        else
        {
            return redirect('/ubahpass')->with('info', 'Password Gagal Di-ubah :(');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function searchmovie()
    {
        return view('searchmovie');
    }

    public function actSearchMovie(Request $request)
    {
        $cari = $request->input('q');
        $movie = Movie::where('title', 'LIKE', "%$cari%")->get();
        return view('actsearchmovie', ['data' => $movie]);
    }
}
