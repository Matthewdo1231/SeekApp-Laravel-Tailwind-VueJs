<div class="border-r border-gray-400">
  <p class="bg-blue-400 text-white font-bold p-4 text-2xl">
   Job Full description
  </p> 
<div id="listingDescriptionContainer" class="relative w-[40rem] bg-white-200 p-6">
 </div>
</div>



<script>
  let isEditing = false;
  let currentJobId;

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
         saveChanges(editableInfo);
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



 function saveChanges(editableInfo){
  let data; 
  let dataArray =[];
  editableInfo.forEach(element => {
    dataArray.push(element.innerHTML);
  })
  data ={         
            role: dataArray[0],
            companyname: dataArray[1],
            jobaddress: dataArray[2],
            jobtype: dataArray[3],
            about: dataArray[4],
            aboutRole: dataArray[5],
            requirements: dataArray[6],
            benefits: dataArray[7],
     }
   console.log(data)  
       fetch('/saveDescriptionChanges',{
          method:'POST',
          headers:{
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-TOKEN': csrfToken,
            'id' : currentJobId,
          },
          body:JSON.stringify(data)
       })
 }
 

</script>


