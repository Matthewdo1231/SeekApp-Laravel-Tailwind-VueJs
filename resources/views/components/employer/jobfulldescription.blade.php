<div class="border-r border-gray-400">
  <p class="bg-blue-400 text-white font-bold p-4 text-2xl">
   Job Full description
  </p> 
<div id="listingDescriptionContainer" class="relative w-[40rem] bg-white-200 p-6">
 </div>
</div>



<script>
  let isEditing = false;

  function addEditDescriptionListener(){
    const editButtonElem = document.querySelector('#edit-button');
    const editingButtonElem = document.querySelector('#editing-buttons');
    const discardButtonElem = document.querySelector('#discard-button');
    const saveButtonElem = document.querySelector('#save-button');
    const editableInfo = document.querySelectorAll('[data-job-editable]');

    editButtonElem.addEventListener('click',()=>{
         toggleEditButton(editButtonElem,editingButtonElem);
         addInfoFocus(editableInfo);
    })

    discardButtonElem.addEventListener('click',()=>{
         toggleEditButton(editButtonElem,editingButtonElem);+
         addInfoFocus(editableInfo);
    })

    saveButtonElem.addEventListener('click',()=>{
         toggleEditButton(editButtonElem,editingButtonElem);
         addInfoFocus(editableInfo);
    })
  }


  function toggleEditButton(editButtonElem,editingButtonElem){
     if(!isEditing){
        isEditing = true;
        editButtonElem.classList.add('hidden');
        editingButtonElem.classList.remove('hidden');
     }
     else{
      isEditing = false;
      editButtonElem.classList.remove('hidden');
      editingButtonElem.classList.add('hidden');
     }
       
  }

 function addInfoFocus(editableInfo){
  if(isEditing)
    editableInfo.forEach(element => {
        element.setAttribute('contenteditable', 'true');
        element.classList.add('outline','outline-[2px]','outline-blue-400');
    });
  else if(!isEditing){
    editableInfo.forEach(element => {
        element.removeAttribute('contenteditable', 'true');
        element.classList.remove('outline','outline-[2px]','outline-blue-400');
    });
  } 
 } 


 
 

</script>


