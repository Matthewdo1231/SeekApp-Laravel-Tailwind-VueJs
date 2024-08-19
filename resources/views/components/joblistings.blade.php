<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

{{--parent container--}}
<div class="mt-6 lg:grid lg:grid-cols-[3fr_4fr] lg:max-w-[1280px] lg:mx-auto lg:gap-4"> 
   {{--job listing column container--}}
  <div class="flex flex-col mx-6 gap-4 ">
    
  @foreach($joblistings as $joblisting)

   <article id="jobfulldesc-js" data-job-id="{{$joblisting -> hashId}}" class="group relative flex flex-col p-8 rounded-lg border-2 border-gray-300 hover:cursor-pointer">
     <i class="absolute right-4 fa-regular fa-bookmark text-blue-900"></i>
     <div class="flex py-8">
      <img class="w-24" src="images/companylogo/company.png">
     </div>
     <div class="hover:group font-bold text-gray-700 mb-1 group-hover:underline">{{$joblisting -> role}}</div>
     <div class="text-md text-gray-600 mb-3">{{$joblisting -> companyname}}</div>
     <div>{{$joblisting -> jobaddress}}</div>
   </article>
  @endforeach

  </div>

  {{--job full description column component--}}
    <x-joblistingfulldescription :joblistingFullDesc="$joblistingFullDesc"/>

  </div>
 </div>

 <script>
    jobContainerElem = document.querySelectorAll('#jobfulldesc-js');
                
    //redirects using the job Id
    jobContainerElem.forEach(elem =>{
        elem.addEventListener('click' , ()=>{
          let id = elem.getAttribute('data-job-id');
          fetch('/api/fulljobdesc',{
            method:'GET',
            headers:{
              'id' : id,
            }
          }).then(response => response.json())
            .then(data => console.log(data));
        })
    })


   //Inserts outset in the joblisting container
   jobContainerElem.forEach(elem => {
        elem.addEventListener('click', ()=>{
            //removeAllOutset();
            elem.classList.add('outline', 'outline-4','outline-orange-500' ,'outline-offset-2', 'p-4');
        })
   })
   



</script>
     
