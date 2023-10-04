@extends('cpanel.layouts.main')


@section('content')
  <div class="flex flex-row justify-center">
      <div class="rounded-lg shadow bg-gray-800 border-gray-700">
          <div class="space-y-4 p-8 w-96">
              <h1 class="text-xl font-bold leading-tight tracking-tight  md:text-2xl text-white">
                  Sign in to your account
              </h1>
              <form class="space-y-4 " action="{{ route('login') }}" method="POST">
                {{ csrf_field() }}
                <div>
                    <label for="cpanel-login" class="block mb-2 text-sm font-medium  text-white">Your email</label>
                    <input type="text" name="cpanel-login" id="cpanel-login" class="rounded-none rounded-l-lg rounded-r-lg bg-gray-50 border  border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="username" required="">
                </div>
                <div>
                    <label for="cpanel-password" class="block mb-2 text-sm font-medium  text-white">Password</label>
                    <input type="password" name="cpanel-password" id="cpanel-password" placeholder="••••••••" class="rounded-none rounded-l-lg rounded-r-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                </div>
                <button type="submit" class="w-full text-white bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 shadow-lg shadow-purple-500/50 dark:shadow-lg dark:shadow-purple-800/80 font-medium rounded-lg text-sm px-3 py-2.5 text-center mr-1 mb-1">Sign in</button>
              </form>
          </div>
      </div>
  </div>
@stop






