
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

<script>
   
  //add actions to each listing
  showActionRow();

 function showActionRow(){
     //show every listing action row in each joblistings container
   let listingColumnElem = document.querySelectorAll('#joblisting-column');
   listingColumnElem.forEach(element => {
       element.addEventListener('mouseover',(event)=>{
          event.stopPropagation();
          let listing = document.querySelector(`[data-joblisting-action='${element.dataset.joblistingId}']`);
          hideAllActionColumn();
          listing.classList.remove('hidden');
          listing.classList.add('flex');
       })
   });
 }

  //removes actions row after hover outside the listings
 document.body.addEventListener('mouseover',()=>{
    hideAllActionColumn();
  })
 
   function hideAllActionColumn(){
       let allListingActionRow = document.querySelectorAll('[data-joblisting-action]');
        allListingActionRow.forEach(element =>{
            element.classList.add('hidden');
        })
   }
  
</script>