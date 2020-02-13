<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;

class HomeController extends Controller
{
    protected $pageContent = [];
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

        // Since we're cool, we are using the new Arrow Function introduced in PHP 7.4.
        // For those who don't like the bleeding edge until it becomes 120% stable,
        // you can use a Closure. The only difference are the number of lines.
        // $gate->define('see-dashboard', fn ($user) => $user->is_admin);

        // Now, we can just simply call the authorization middleware like normal.
        // And redirects to 403 if not satisfied
        // $this->middleware('can:see-dashboard');


        // $this->middleware(function ($request, $next) {
        //     $this->projects = Auth::user()->projects;

        //     return $next($request);
        // });


        // $this->middleware('can:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Gate::allows('admin') || Gate::allows('user')) {

            $this->pageContent = $this->generatedDefaultContent(Route::currentRouteName());
            $this->pageContent = $this->addPageContent([
                'description' => 'This is a dashboard page'
            ]);

            return view('content', $this->pageContent);
        }
        // The current user can edit settings
        abort(403, 'Access denied');
    }

    public function settings()
    {
        if (Gate::allows('admin')) {

            $this->pageContent = $this->generatedDefaultContent(Route::currentRouteName());

            return view('content', $this->pageContent);
        }
        // The current user can edit settings
        abort(403, 'Access denied');
    }

    protected function generatedDefaultContent($currentRouteName)
    {
        return [
            'siteTitle' => ucfirst($currentRouteName),
            'pageTitle' => ucfirst($currentRouteName)
        ];
    }

    protected function addPageContent($contentArray)
    {
        return array_merge($this->pageContent, $contentArray);
    }
}
