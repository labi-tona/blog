
@extends('layout.app')

   @auth
        <nav class="bg-white dark:bg-gray-900 fixed w-full z-20 top-0 left-0 border-b border-gray-200 dark:border-gray-600">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                <a href="https://flowbite.com/" class="flex items-center">
                    <img src="{{ asset('assets/images/statue.png') }}" class="rounded-lg   w-5">
                    <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">IBLOG</span>
                </a>
                <div class="flex md:order-2">
                      <div class=" justify-center mx-auto">

            <form action="/logout" method="POST">
                @csrf
                <button
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium my-2 rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ">Logout</button>
            </form>
        </div>
                    <button data-collapse-toggle="navbar-sticky" type="button"
                        class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                        aria-controls="navbar-sticky" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
                    <ul
                        class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                        <li>
                            <a href="#"
                                class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500"
                                aria-current="page">Home</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">About</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Services</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="flex mx-auto justify-center mt-[100px]">
            <div class="mr-[100px]">
            <p class="text-6xl font-bold my-10">As A <span class="text-blue-700">Blogger</span> You <br>Can Create<br> A Post</p>
            <p class="pb-10">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Esse mollitia dolore,<br> nihil culpa eveniet sequi fuga dicta nemo delectus corrupti nulla,<br> quas molestiae ullam dolorum!</p>
              <a href="{{ route('create')}}"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full  sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ">Create a blog</a>
            </div>
            <img src="{{ asset('assets/images/guysit.png') }}" class="w-[400px] ">
        </div>
        <div class="px-10  mb-10 rounded-lg py-10 justify-center  mx-auto">
            <h2 class="text-xl font-bold ">All Posts</h2>
            <div class="grid grid-cols-3 gap-x-8 gap-y-16 justify-center mx-auto border-tborder-gray-200 pt-10 ">
                @foreach ($posts as $post)
                    <div class="">
                        <img src="{{ asset('assets/images/top.jpg') }}" class="rounded-lg">
                        <h3 class="text-xl font-semibold py-2">{{ $post['title'] }} by {{ $post->user->name }}</h3>
                        {{ $post['body'] }}
                        <div class="flex justify-between pt-5">
                        <p class="py-2 px-5 text-center border border-blue-700 rounded-md font-semibold"><a href="/edit-post/{{ $post->id }}">Edit</a></p>
                        <form action="{{ route('posts.delete', $post) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ">Delete</button>
                        </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="flex mx-auto justify-center py-[50px]">
            <div class="mr-[100px]">
            <p class="text-6xl font-bold my-10">As A <span class="text-blue-700">Blogger</span> You <br>Can Create<br> A Post</p>
               <a href="{{ route('create')}}"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full  sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ">Create Post</a>
            </div>
            <img src="{{ asset('assets/images/girlwrite.png') }}" class="w-[400px]"/>
        </div>


<footer class="bg-white rounded-lg shadow m-4 dark:bg-gray-800">
    <div class="w-full mx-auto max-w-screen-xl p-4 md:flex md:items-center md:justify-between">
      <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2023 <a href="https://flowbite.com/" class="hover:underline">IBLOG</a>. All Rights Reserved.
    </span>
    <ul class="flex flex-wrap items-center mt-3 text-sm font-medium text-gray-500 dark:text-gray-400 sm:mt-0">
        <li>
            <a href="#" class="mr-4 hover:underline md:mr-6 ">About</a>
        </li>
        <li>
            <a href="#" class="mr-4 hover:underline md:mr-6">Privacy Policy</a>
        </li>

        <li>
            <a href="#" class="hover:underline">Contact</a>
        </li>
    </ul>
    </div>
</footer>

    @else
        <div class="bg-gradient-to-r from-green-500  py-[100px]">
            <div>
                <div class="px-10 w-1/2 mb-10 border border-gray-300 rounded-lg py-10 justify-center  mx-auto">
                    <h2 class="mb-6 text-2xl text-center font-semibold">Create an account</h2>
                    <form action="/register" method="POST">
                        @csrf
                        <input name="name" type="text" placeholder="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500  mb-6 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>
                        <input name="email" type="text" placeholder="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block mb-6 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>

                        <input name="password" type="password" placeholder="password"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block mb-6 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>
                        <button
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ">Submit</button>
                    </form>

                </div>
                <a href="{{ route('login') }}"
                    class="text-white bg-blue-700 flex justify-center  mx-auto hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-[100px]  px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ">Login</a>

            </div>
        </div>
    @endauth

