<div id="listingcolumn" class="max-w-[30rem] flex-1 flex flex-col"> 

  <p class="bg-blue-400 text-white font-bold p-4 text-2xl">
     Jobs
  </p> 
  
  <div class="flex">
    <button id="active" data-button class="relative flex-1 py-2 text-xl border-b-2 border-blue-400">Active
      <i class="absolute left-8 bottom-5 text-[10px] text-green-500 fa-solid fa-circle"></i>
    </button>
    <button id="inactive" data-button class="relative flex-1 text-xl text-gray-500 border-b-2 opacity-[.5]">InActive
      <i class="absolute left-6 bottom-5 text-[10px] text-red-500 fa-solid fa-circle"></i>
    </button>
  </div>
  <ul class="flex px-4 py-2 gap-8">
    <li class="text-sm text-gray-500">Company logo</li>
    <li class="text-sm text-gray-500">Company name</li>
    <li class="text-sm text-gray-500 pr-10">Role</li>
    <li class="text-sm text-gray-500">Date posted</li>
  </ul>
  <div id="all-listings" class="overflow-auto h-[44rem]">
    @if(count($joblistings) != 0)
      @foreach($joblistings as $joblisting)
        <article class="flex gap-6 border-b-[1px] border-gray-400 py-8 px-4 overflow-hidden">
          <img class="h-6" src={{asset('images/companylogo/company.png')}}>
          <p class="text-md truncate w-[6rem] text-center" value="wtf">{{$joblisting->companyname}}</p>
          <p class="text-md truncate w-[7rem] text-center ">{{$joblisting->role}}</p>
          <p class="text-md truncate w-[7rem] text-center">{{$joblisting->created_at->format('M j, Y')}}</p>
        </article>
      @endforeach
    </div> 
   @else
    <p class="text-gray-400 p-4">No active joblistings</p>
  @endif
 
</div> 


<script>
  let buttonsElem = document.querySelectorAll('[data-button]');
  let joblistingElem = document.querySelectorAll

//Dynamically fetch active and inactive listings
 buttonsElem.forEach(element => {
    element.addEventListener('click',()=>{
        let status = element.getAttribute("id");

         //clears the column 
         let allListingsElem = document.getElementById('all-listings');
         allListingsElem.innerHTML = ''; 

        fetch('/activeInactive',{
          method:'GET',
          headers:{
           'jobstatus': status,
          }
        }).then(response => response.json())  
          .then(joblistings => renderData(joblistings))
    })
      
 })


  //Render fetched data
function renderData(joblistings){
  let allListingsElem = document.getElementById('all-listings');
  //checks if data fetch is empty
   if((joblistings.data.length)=== 0){
     allListingsElem.innerHTML = '<p class="text-gray-400 p-4">No inactive joblistings</p>'; 
   }
   joblistings.data.map((job)=>{
      let date = formatDate(job.created_at);
      let html = 
      `<article class="flex gap-6 border-b-[1px] border-gray-400 py-8 px-4 overflow-hidden">
        <img class="h-6" src={{asset('images/companylogo/company.png')}}>
        <p class="text-md truncate w-[6rem] text-center" value="wtf">${job.companyname}</p>
        <p class="text-md truncate w-[7rem] text-center ">${job.role}</p>
        <p class="text-md truncate w-[7rem] text-center">${date}</p>
       </article>`;
       allListingsElem.innerHTML += html;
   })
}

 // Active and Inactive cuztomization
 buttonsElem.forEach(element => {
   element.addEventListener('click',()=>{
        untoggleAll();
        addStyle(element);
    })
});


function addStyle(element){
    element.classList.remove('border-transparent','opacity-[.5]');
    element.classList.add('border-b-2','border-blue-400');
}

function untoggleAll(){
buttonsElem.forEach(element=>{
  element.classList.add('border-transparent','opacity-[.5]');
  element.classList.remove('border-blue-400');
  });
}

//format date 

function formatDate(created_at){
     let d = created_at.split('T');
     d = d[0].split('-');
    const date = new Date(d);
    const formattedDate = date.toLocaleDateString('en-US', {
      month: 'short',
      day: 'numeric',
      year: 'numeric'
    });
      return formattedDate;
    }

</script>
