<div class="w-[1442px] relative">
    <p class="bg-blue-400 text-white text-center font-bold p-4 text-2xl">
        Applicants
     </p>
     @php
      $stagseObj = $stages[0];
      $stage = explode(',',$stagseObj->employement_stage);
     @endphp  
     <div class="flex">
      <button id="manage-icon" class="p-2 border-2 border-blue-400"><i class="fa-solid fa-bars text-3xl text-gray-500"></i></button>

     @foreach($stage as $item)
      <button id="active" data-button class="relative flex-1 py-2 text-xl border-b-2 border-blue-400">
        {{$item}}
      </button>
      @endforeach
    </div>

    <div id="manage-buttons" class="hidden absolute z-10 top-24 mt-6 text-lg bg-blue-200 text-gray-500">
      <button class="p-4 text-center text-gray-500 hover:bg-blue-500 hover:text-white">Add Employement Stage</button>
      <button class="p-4 text-center text-gray-500 hover:bg-blue-500 hover:text-white">Remove an Employement Stage</button>
    </div>

</div> 

<script>
   
  renderStages();

  //add styles when clicked
  function renderStages(){
  let stageButtonsElem = document.querySelectorAll('#active');

   stageButtonsElem.forEach(elem => {
     addOpacity(stageButtonsElem);
      elem.addEventListener('click',()=>{
         addOpacity(stageButtonsElem);
         elem.classList.remove('opacity-30');
      })
   })

     //Initially remove opacity in the first row
     stageButtonsElem[0].classList.remove('opacity-30')
  }
  

   function addOpacity(stageButtonsElem){
    stageButtonsElem.forEach(elem=>{
       elem.classList.add('opacity-30')
    })
   }

 
 //manage stages button 
   const manageIcon = document.querySelector('#manage-icon');
   const managebuttons = document.querySelector('#manage-buttons');
   let isManageButtonClicked = false;

   //toggle manage buttons
   manageIcon.addEventListener('click',()=>{
       if(!isManageButtonClicked){
        managebuttons.classList.remove('hidden')
        managebuttons.classList.add('flex','flex-col')
        isManageButtonClicked = true;
       }
       else{
        managebuttons.classList.add('hidden')
        managebuttons.classList.remove('flex','flex-col')
        isManageButtonClicked = false;
       }
   })




</script>