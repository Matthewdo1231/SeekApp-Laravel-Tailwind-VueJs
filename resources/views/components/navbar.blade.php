  <nav class="container mx-auto flex items-center justify-between border-b-2">
      <div>
        <a class="flex items-center" href="/">
          <img class="w-24 p-4 "src="{{asset('images/SeekAppLogo.png')}}">
          <p class="text-3xl font-bold text-orange-400">Seekapp</p>
        </a>
      </div>
      @auth
      <div class="relative flex gap-6 mr-4">
        <button id="user-dropdown" class="relative group flex gap-4 mr-4 py-8 border-b-2 border-transparent hover:border-orange-500">
          <i class="fa-solid fa-user text-lg md:pt-1 text-gray-500 group-hover:text-orange-500"></i>
          <li class="hidden md:block text-lg text-gray-500 group-hover:text-orange-500">{{Auth::user()->name}}</li>
        </button>
        <div id="user-dropdown-menu" class="hidden absolute top-16 right-10 md:right-32 z-10 w-[20rem] bg-white rounded-[4px] border-[1px] border-gray-300 shadow-sm">
          <ul class="flex flex-col">
            <i class="absolute z-20 right-10 top-[-18px] md:right-10 text-gray-300 text-md">&#9650</i>
            <p class="font-bold p-4 mb-2 text-gray-700 text-left">{{Auth::user()->email}}</p>
            <li class="text-gray-700 flex p-6 hover:bg-gray-300 hover:cursor-pointer"><i class="fa-regular fa-newspaper w-8 text-2xl"></i>Profile Settings</li>
            <li class="text-gray-700 flex p-6 hover:bg-gray-300 hover:cursor-pointer"><i class="fa-regular fa-bookmark w-8 text-2xl"></i></i>Saved Jobs</li>
          </ul>
        </div>
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

    <script>
      const userDropDownElem = document.querySelector('#user-dropdown')
      const userDropDownMenuElem = document.querySelector('#user-dropdown-menu')
      let isDropDownClicked = false;
   //Dropdown Menu Toggle
      userDropDownElem.addEventListener('click',(event)=>{
        event.stopPropagation();
        if(!isDropDownClicked){
          userDropDownMenuElem.classList.remove('hidden');
          isDropDownClicked = true;
        }
        else{
          userDropDownMenuElem.classList.add('hidden');
          isDropDownClicked = false;
        }
      })
    //Hide menu after body is clicked
     document.body.addEventListener('click',()=>{
        userDropDownMenuElem.classList.add('hidden');
        isDropDownClicked = false;
      })

    </script>