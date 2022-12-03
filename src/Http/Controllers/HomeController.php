<?php
/**
 * @author Roberto Rielo <roberto910907@gmail.com>.
 *
 * @version laravel-database-designer
 */
declare(strict_types=1);

namespace DBDesigner\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\View\View;

class HomeController extends Controller
{
    //
    public function index(): View
    {
        return view('db-designer::layout');
    }
}
