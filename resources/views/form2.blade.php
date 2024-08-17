<x-layout>
   <!--To add more input create a unique id to input element and it's pen font and them to the same group id-->

 

@foreach($jobinfos as $jobinfo)

<form id="form2" method="POST" action="/create" class="flex flex-row justify-center">
   @csrf

  <div class="flex flex-col w-[64rem] ">
      <div class="w-[100%] flex justify-end">
       <img class="w-[50%]" src="{{asset('images/formarts/form2.jpg')}}">
     </div>

    <p class="text-2xl mx-48 font-bold">Overview</p>

    <div class="relative flex flex-col">
       <p class="text-lg mx-48 mt-4">About the Company</p>
       <input data-group="input" id="jobtitle-input" name="about" value="{{$jobinfo -> about}}" class="mx-48 mt-2 outline-none border-2 rounded-md p-2" placeholder="Edit jobtitle">
       <i data-group="pen" id="jobtitle-edit-js" class="fa-solid fa-pen absolute right-60 bottom-4 text-md hover:cursor-pointer"></i>
    </div>
    
    <div class="relative flex flex-col">
       <p class="text-lg mx-48 mt-4">About the Role</p>
       <input data-group="input" id="companyname-input" name="aboutRole" value="{{$jobinfo -> aboutRole}}"  class="mx-48 mt-2 outline-none border-2 rounded-md p-2" placeholder="Edit jobtitle">
       <i data-group="pen" id="companyname-edit-js" class="fa-solid fa-pen absolute right-60 bottom-4 text-md hover:cursor-pointer"></i>
    </div>  

    <div class="relative flex flex-col">
       <p class="text-lg mx-48 mt-4">Company Address</p>
       <input data-group="input" id="jobaddress-input" name="requirements" value="{{$jobinfo -> requirements}}" class="mx-48 mt-2 outline-none border-2 rounded-md p-2" placeholder="Edit jobtitle">
       <i data-group="pen" id="jobaddress-edit-js" class="fa-solid fa-pen absolute right-60 bottom-4 text-md hover:cursor-pointer"></i>
    </div>  

    <div class="relative flex flex-col">
       <p class="text-lg mx-48 mt-4">Employement Type</p>
       <input data-group="input" id="jobtype-input" name="benefits" value="{{$jobinfo -> benefits}}"  class="mx-48 mt-2 outline-none border-2 rounded-md p-2" placeholder="Edit jobtitle">
       <i data-group="pen" id="jobtype-edit-js" class="fa-solid fa-pen absolute right-60 bottom-4 text-md hover:cursor-pointer"></i>
    </div>  

     <div class="flex">
       <button id="submit" type="submit" class="flex w-[64rem] mx-56 mt-24 justify-end">
        <i class="fa-solid fa-arrow-right text-4xl text-orange-500 hover:cursor-pointer active:opacity-50"></i>
       </button>
     </div>
      
   </div>
</form>

@endforeach
</x-layout>



<script>
   //routes to second page//////////////
   document.querySelector('#submit').addEventListener('click',()=>{
           window.location.href = 'form2';
         })
 ///////////////////////////////////////

   //form interactivity/////////////////
   let penElem = document.querySelectorAll('[data-group="pen"]');
   let inputElem = document.querySelectorAll('[data-group="input"]');


   penElem.forEach((elem)=>{
             elem.addEventListener('click',(event)=>{
                event.stopPropagation();
                showPen();
                removeBorder();
                activateBorder(elem.getAttribute('id'));
                elem.classList.add('invisible');
             })
       })

   inputElem.forEach((elem)=>{
             elem.addEventListener('click',(event)=>{
               event.stopPropagation();
                removeBorder();
                removePen(elem.getAttribute('id'));
                elem.classList.add('border-blue-500');
             })
       })
   

   function showPen(){
       penElem.forEach((elem)=>{
             elem.classList.remove('invisible')
       })
   }    

   function removePen(id){
       let elem = (id.split('-'));
       let currentElem = document.querySelector(`#${elem[0]}-edit-js`);
       showPen();
       currentElem.classList.add('invisible');
   }

   function activateBorder(id){
       let elem = (id.split('-'));
       let currentElem = document.querySelector(`#${elem[0]}-input`);
       currentElem.focus();
       currentElem.classList.add('border-blue-500');
   }

   function removeBorder(){
       inputElem.forEach((elem)=>{
          elem.classList.remove('border-blue-500')
       })
   }

   document.body.addEventListener('click',()=>{
       removeBorder();
       showPen();
   })  


  //Form asychronous submission ////////////

         const formElem =  document.querySelector('#form2');

         formElem.addEventListener('submit',(event)=>{
           event.preventDefault();

          let formData = new FormData(formElem);

          fetch(formElem.action,{
           method:'POST',
           headers: {
               'X-Requested-With': 'XMLHttpRequest',
           },
           body:formData,
          })
          .then(()=>{
           console.log('Form submitted successfully');
          }
        
         )
         .catch((error)=>{
           console.error('Error',error);
         })

  })

</script>
