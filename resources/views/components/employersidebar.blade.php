
<nav class="flex flex-col border-r-[1px] border-gray-400">
    <button class="relative flex justify-around my-2"> 
        <i class="fa-solid fa-xmark absolute text-2xl left-3 top-1 text-gray-600"></i>
        <span class="ml-2 text-xl text-gray-500">Collapse</span>
    </button>
    
    <a href="/employer/create/form1" class="relative flex justify-around my-2 mx-2 border-2 border-blue-400 rounded-lg"> 
        <i class="fa-solid fa-plus absolute text-xl left-1 top-1 text-blue-500"></i>
        <span class="ml-4 text-xl text-blue-400">Create new</span>
    </a>

    <button class="relative flex justify-around my-2"> 
        <i class="fa-solid fa-briefcase absolute text-2xl left-3 top-1 text-gray-600"></i>
        <span class="ml-2 text-xl text-gray-500">Listings</span>
    </button>
  
    <button class="relative flex justify-around my-2"> 
        <i class="fa-solid fa-user-tie absolute text-2xl left-3 top-1 text-gray-600"></i>
        <span class="ml-4 mt-1 text-xl text-gray-500">Applicants</span>
    </button>

    <form method="POST" action="/user/logout" class="group flex gap-4 mr-4 py-8 border-b-2 border-transparent hover:border-orange-500"> 
        @csrf
        <i class="fa-solid fa-door-open text-lg md:pt-1 text-gray-500 group-hover:text-orange-500"></i>
         <button type="submit" class="hidden md:block text-lg text-gray-500 group-hover:text-orange-500">Logout</button>
       </a>
      </form>
    
  
</nav>