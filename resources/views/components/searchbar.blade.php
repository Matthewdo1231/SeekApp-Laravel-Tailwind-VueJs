<form method="GET" class="flex flex-col justify-center md:flex-row">
   <div class="relative flex flex-col mx-6 mt-2 md:inline md:mx-0"> 
    <i class="absolute top-5 left-4 fa-solid fa-magnifying-glass text-gray-400"></i>
    <input name="search" type="text" placeholder="Jobtitle, company" class="
    h-14 pl-10 border-2 border-gray-400 rounded-t-lg md:rounded-tr-none pr-28 md:rounded-l-lg md:shadow-lg md:shadow-gray-400 lg:pr-64 lg:shadow-lg lg:shadow-gray-400 focus:border-orange-500 outline-none 
      ">
     </div>  
    <div class="relative flex flex-col mx-6 md:flex-row justify-center md:mt-2 md:mx-0">
    <i class="absolute top-5 left-4 fa-solid fa-location-dot text-gray-400"></i>   
    <input type="text" placeholder="City, Zip, state, 'remote'" class="
    h-14 pl-10 border-2 border-t-2 rounded-b-lg border-gray-400 shadow-lg shadow-gray-400 md:pr-28 md:rounded-l-none md:border-t-2 md:rounded-tr-lg md:border-l-2 md:ml-0 lg:pr-64 focus:border-orange-500 outline-none
    ">
    <button class="sm:hidden md:inline md:absolute md:p-2 md:top-2 md:right-4 md:rounded-lg md:bg-orange-400 hover:bg-orange-500 md:text-white md:font-bold md:shadow-md md:shadow-gray-400">Seek Jobs</button>
     </div>
    {{--button visible in small screen--}}
      <div class="flex justify-center mt-4">
        <button class="p-3 px-40 bg-orange-400 rounded-lg text-lg font-bold text-white md:hidden hover:bg-orange-500">Seek Jobs</button>
      </div>
</form>