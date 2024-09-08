
  <article data-joblisting-id="{{$joblisting -> id}}" id="joblisting-column" class="relative flex gap-6 border-b-[1px] border-gray-400 py-10 px-4 overflow-hidden shadow-md shadow-gray hover:cursor-pointer">
    <img class="h-6" src={{asset('images/companylogo/company.png')}}>
    <p class="text-md truncate w-[6rem] text-center" value="wtf">{{$joblisting->companyname}}</p>
    <p class="text-md truncate w-[7rem] text-center ">{{$joblisting->role}}</p>
    <p class="text-md truncate w-[7rem] text-center">{{$joblisting->created_at->format('M j, Y')}}</p>
    <ul data-joblisting-action="{{$joblisting -> id}}" id="listing-action" class="hidden absolute bottom-1 left-10 gap-5 p-2">
        <i class="fa-regular fa-file text-gray-500 hover:text-gray-700"><span class="p-2 text-sm font-sans">Move to drafts</span></i>
        <i class="fa-regular fa-circle-pause text-gray-500 hover:text-gray-700"><span class="p-2 text-sm font-sans">Pause listings</span></i>
        <i class="fa-solid fa-trash text-red-500 hover:text-red-600"><span class="p-2 text-sm font-sans">Delete</span></i>
      </ul>
  </article>
