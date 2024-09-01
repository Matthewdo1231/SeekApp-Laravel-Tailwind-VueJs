<div class="max-w-[30rem] flex-1 flex flex-col"> 

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

  @if(count($joblistings) != 0)
    @foreach($joblistings as $joblisting)
       <article class="flex gap-6 border-b-[1px] border-gray-400 py-8 px-4 overflow-hidden">
        <img class="h-6" src={{asset('images/companylogo/company.png')}}>
        <p class="text-md truncate w-[6rem] text-center" value="wtf">{{$joblisting->companyname}}</p>
        <p class="text-md truncate w-[7rem] text-center ">{{$joblisting->role}}</p>
        <p class="text-md truncate w-[7rem] text-center">{{$joblisting->created_at}}</p>
       </article>

    @endforeach
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
        fetch('/activeInactive',{
          method:'GET',
          headers:{
           'jobstatus': status,
          }
        }).then(response => response.text())
          .then(data => console.log(data))
    })
      
 })




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



</script>
