<?php
namespace App\Http\Controllers;

use App\User;
class UserController extends Controller
{
public function index(User $user)
{
    return view('Userindex')->with(['own_posts' => $user->getOwnPaginateByLimit()]);
}
public function index2(User $user)
{
    return view('Userindexeach')->with(['own_post' => $user->getOwnPaginateByLimit2()]);
}
}
?>