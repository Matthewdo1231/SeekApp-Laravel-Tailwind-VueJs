<div class="w-[1442px] relative">
    <p class="bg-blue-400 text-white text-center font-bold p-4 text-2xl">
        Applicants
     </p>
     @php
      $stagseObj = $stages[0];
      $stage = explode(',',$stagseObj->employement_stage);
     @endphp  
     <div id="stages-row" class="flex">
      <button id="manage-icon" class="p-2 border-2 border-blue-400"><i class="fa-solid fa-bars text-3xl text-gray-500"></i></button>

     @foreach($stage as $item)
      <button id="active" data-button class="relative flex-1 py-2 text-xl border-b-2 border-blue-400">
        <i data-remove-button id="{{$item}}" class="fa-solid fa-x text-red-500 hover:bg-gray-200 hover:rounded-full" style="display:none"></i>
        {{$item}}
      </button>
      @endforeach
    </div>

    <div id="manage-buttons" class="hidden absolute z-10 top-24 mt-6 text-lg bg-blue-200 text-gray-500">
      <button id="add-stage-button" class="p-4 text-center text-gray-500 hover:bg-blue-500 hover:text-white">Add Employement Stage</button>
      <button id="remove-stage-button" class="p-4 text-center text-gray-500 hover:bg-blue-500 hover:text-white">Remove an Employement Stage</button>
    </div>

</div> 

<script>
  const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
   
  let stageButtonsElem;

  renderStages();

  //add styles when clicked
  function renderStages(){
  stageButtonsElem = document.querySelectorAll('#active');

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
   const managebuttons = document.querySelector('#manage-buttons');
   let isManageButtonClicked = false;

  //Hide manage stage pop-up after clicking outside
    document.body.addEventListener('click',()=>{
      managebuttons.classList.add('hidden')
      managebuttons.classList.remove('flex','flex-col')
      isManageButtonClicked = false;
      //removes all removeButton
       document.querySelectorAll('[data-remove-button]').forEach((elem)=>{
          elem.style.display ="none";
       })
   }) 

   //toggle manage buttons
   manageIconListener();
   function manageIconListener(){
   const manageIcon = document.querySelector('#manage-icon'); 
   manageIcon.addEventListener('click',(event)=>{
     event.stopPropagation();
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
   }

  //Adding employement stage
  const addStageButton = document.querySelector('#add-stage-button');
  const removeStageButton = document.querySelector('#remove-stage-button');
  const stagesRow = document.querySelector('#stages-row');
  let confirmButtonElem;
  let discardButtonElem;


  addStageButton.addEventListener('click',()=>{
     stagesRow.innerHTML += `
                      <button id="newStage" id="active" data-button class="relative flex flex-1 py-2 text-xl border-b-2 text-black border-blue-400">
                        <div contenteditable="true" class="relative flex flex-1 text-xl text-black justify-center"></div>
                        <div id="confirmDiscard-button"class="hidden">
                         <i id="confirm-button" class="absolute right-10 fa-solid fa-check p-2 text-sm bg-green-500 rounded-full"></i>
                         <i id="discard-button" class="absolute right-2 fa-solid fa-x p-2 text-sm bg-red-500 rounded-full"></i>
                        </div> 
                      </button> `;
     currentAddedElem = document.querySelector('[contenteditable="true"]');
     confirmButtonElem = document.querySelector('#confirm-button').addEventListener('click',()=>{confirmNewStage()})
     discardButtonElem = document.querySelector('#discard-button').addEventListener('click',()=>{discardNewStage()})
     currentAddedElem.focus();
     addConfirmRemoveButton(currentAddedElem);
  })

 //remove or confirm Button 
   function addConfirmRemoveButton(currentAddedElem){
    currentAddedElem.addEventListener('keydown',(event)=>{
       if((currentAddedElem.innerHTML).length != 1 && (event.key != 'Backspace')){
         document.querySelector('#confirmDiscard-button').classList.remove('hidden');
       }
       else if((currentAddedElem.innerHTML).length == 1){
        document.querySelector('#confirmDiscard-button').classList.add('hidden')
       }
    })
   }
   
   function confirmNewStage(){
     let newStage = document.querySelector('[contenteditable="true"]').innerHTML;
     console.log(newStage)
     fetch('/confirmNewStage',{
      method:'POST',
      headers:{
        'X-Requested-With': 'XMLHttpRequest',
        'X-CSRF-TOKEN': csrfToken,
        'newStage':newStage,
      }
     }).then(()=>appendNewStage(newStage))
   }

   function discardNewStage(){
     document.querySelector('#newStage').remove();
     renderStages();
     manageIconListener()
   }

   function appendNewStage(newStage){
    document.querySelector('#newStage').remove();
    stagesRow.innerHTML += ` 
    <button id="active" data-button class="relative flex-1 py-2 text-xl border-b-2 border-blue-400">
        ${newStage}
      </button>`
    renderStages();
   }

   renderRemoveButton()
  function renderRemoveButton(){ 
    removeButtonElem = document.querySelectorAll('[data-remove-button]')
    removeStageButton.addEventListener('click',(event)=>{
      event.stopPropagation();
      removeButtonElem.forEach((elem)=>{
        elem.removeAttribute('style');
        elem.addEventListener('click',()=>{
          console.log(elem.getAttribute('id'))
           const stage = elem.getAttribute('id');
           fetch('/removeSelectedStage',{
             method:'POST',
             headers:{
              'X-Requested-With': 'XMLHttpRequest',
              'X-CSRF-TOKEN': csrfToken,
              'selectedStage':stage,
             }
           }).then(()=>{elem.parentNode.remove()})
        })
      })
  })
  }
</script>