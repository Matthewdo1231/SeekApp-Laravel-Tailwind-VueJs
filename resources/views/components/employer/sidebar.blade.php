<nav class="flex-2 flex flex-col border-r-[1px] border-gray-400">

    <a href="/employer/create/form1" class="relative flex justify-around my-4 mx-2 px-4 border-2 border-blue-400 rounded-lg"> 
        <i class="fa-solid fa-plus absolute text-md left-2 top-[7px] text-blue-500"></i>
        <span class="ml-4 text-xl text-blue-400">Create new</span>
    </a>

    <a id="listings" href="/employer/listings" class="relative flex justify-around py-2"> 
        <i class="fa-solid fa-briefcase absolute text-2xl left-3 top-[10px] text-gray-600"></i>
        <span class="ml-2 text-xl text-gray-500">Listings</span>
    </a>
  
    <a id="applicants" href="/employer/applicants" class="relative flex justify-around gap-2 py-2"> 
        <i class="fa-solid fa-user-tie absolute text-2xl left-3 text-gray-600"></i>
        <span class="ml-4 text-xl text-gray-500">Applicants</span>
    </a>

    <button class="relative flex justify-around gap-2 py-2"> 
        <i class="fa-solid fa-pen-to-square absolute text-2xl left-3 text-gray-600"></i>
        <span class="ml-1 text-xl text-gray-500">Drafts</span>
    </button>
  
    <form method="POST" action="/user/logout" class="mt-auto"> 
        @csrf
       <div class="flex mx-6 mb-4 group"> 
        <i class="fa-solid fa-door-open text-lg pt-1 mr-4 text-gray-600 group-hover:text-red-500"></i>
        <button type="submit" class="block text-lg text-gray-600 group-hover:text-red-500">Logout</button>
       </div> 
      </form>
    
</nav>

<script>
   let url = new URL(window.location.href); 
   currentPage = (url.pathname.split('/').at(-1));
   document.getElementById(`${currentPage}`).classList.add('bg-blue-200');

</script>