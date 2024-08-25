  <nav class="container mx-auto flex items-center justify-between border-b-2">
      <div>
        <a class="flex items-center" href="/">
          <img class="w-24 p-4 "src="{{asset('images/SeekAppLogo.png')}}">
          <p class="text-3xl font-bold text-orange-400">Seekapp</p>
        </a>
      </div>
      @auth
      <div class="flex gap-6 mr-4">
        <a href="/login_seeker" class="group flex gap-4 mr-4 py-8 border-b-2 border-transparent hover:border-orange-500">
          <i class="fa-solid fa-user text-lg md:pt-1 text-gray-500 group-hover:text-orange-500"></i>
          <li class="hidden md:block text-lg text-gray-500 group-hover:text-orange-500">{{Auth::user()->name}}</li>
         </a>
        <form method="POST" action="/user/logout" class="group flex gap-4 mr-4 py-8 border-b-2 border-transparent hover:border-orange-500"> 
          @csrf
          <i class="fa-solid fa-door-open text-lg md:pt-1 text-gray-500 group-hover:text-orange-500"></i>
           <button type="submit" class="hidden md:block text-lg text-gray-500 group-hover:text-orange-500">Logout</button>
         </a>
        </form>
      @else
      <div class="flex gap-6 mr-4">
        <a href="/login_seeker" class="group flex gap-4 mr-4 py-8 border-b-2 border-transparent hover:border-orange-500">
          <i class="fa-solid fa-user-plus text-lg md:pt-1 text-gray-500 group-hover:text-orange-500"></i>
          <li class="hidden md:block text-lg text-gray-500 group-hover:text-orange-500">Login</li>
         </a>
        <a href="/sign-up_seeker" class="group flex gap-4 mr-4 py-8 border-b-2 border-transparent hover:border-orange-500"> 
          <i class="fa-solid fa-right-to-bracket text-lg md:pt-1 text-gray-500 group-hover:text-orange-500"></i>
           <li class="hidden md:block text-lg text-gray-500 group-hover:text-orange-500">Sign-up</li>
         </a>
      </div>
      @endauth
    </nav>