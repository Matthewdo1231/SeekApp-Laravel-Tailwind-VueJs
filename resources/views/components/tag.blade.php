<!--
    Complex Implementation, states from alpines js when clicking Tags and manually redirecting request using javascript url 
-->

@php
  $jobTypes = ["Fulltime", "Part-Time"];
  $locations = ["Cebu", "Manila", "Davao"];
  $companies = ["Jenkins-Parisian", "Hintz-Mueller", "Konopelski-Durgan", "Sanford-Hammes", "Ziemann-Senger"];
 @endphp
                   {{--Dynamic tags toggling--}}
<div x-data="{ IsActive: null, isVisible:false }" class="flex flex-cols gap-10 mt-4 justify-center lg:justify-start md:ml-4 xl:w-[72rem] xl:mx-auto"> 
                  
  <div  @click = "
    IsActive = (IsActive === 'tagJobType') ? null : 'tagJobType';
    isVisible = (IsActive === 'tagJobType');"
      class="
      relative text-sm text-gray-600 py-2 px-10 rounded-md bg-light-gray
      lg:p-3">Job Type &#x25BE
       <div x-cloak x-show="(IsActive == 'tagJobType' && isVisible)" class="absolute flex flex-col border-2 mt-3 top-10 left-0 z-10">
        @foreach($jobTypes as $jobType)
          <div data-tag="{{$jobType}}" class="py-2 px-10 whitespace-nowrap bg-white hover:bg-sky-200 hover:cursor-pointer">{{$jobType}}</div>
          @endforeach
        </div>
    </div>

    <div  @click = "
    IsActive = (IsActive === 'tagLocation') ? null : 'tagLocation';
    isVisible = (IsActive === 'tagLocation');"
      class="
      relative text-sm text-gray-600 py-2 px-10 rounded-md bg-light-gray
      lg:p-3">Location &#x25BE
       <div x-cloak x-show="(IsActive == 'tagLocation' && isVisible) " class="absolute flex flex-col border-2 mt-3 top-10 left-0 z-10">
        @foreach($locations as $location)
          <div data-tag="{{$location}}" class="py-2 px-10 bg-white whitespace-nowrap hover:bg-sky-200 hover:cursor-pointer">{{$location}}</div>
          @endforeach
        </div>
    </div>

    <div  @click = "
    IsActive = (IsActive === 'tagCompany') ? null : 'tagCompany';
    isVisible = (IsActive === 'tagCompany');"
      class="
      relative text-sm text-gray-600 py-2 px-10 rounded-md bg-light-gray
      lg:p-3">Company &#x25BE
       <div x-cloak x-show="(IsActive == 'tagCompany' && isVisible) " class="absolute flex flex-col border-2 mt-3 top-10 left-0 z-10">
        @foreach($companies as $company)
          <div data-tag="{{$company}}" class="py-2 px-10 bg-white whitespace-nowrap hover:bg-sky-200 hover:cursor-pointer">{{$company}}</div>
          @endforeach
        </div>
    </div>

</div>

<script>

   addressTagElem = document.querySelectorAll('[data-tag]')

   addressTagElem.forEach(element => {
        element.addEventListener('click',function(){
          let url = new URL(window.location.href);
          url.searchParams.set('tag', element.dataset.tag);
          window.location.href = url;
        })
   });
   

  
     /** document.getElementById('address-js').addEventListener('click', function(event) {
      let url = new URL(window.location.href);
      url.searchParams.set('tag', 'AK');
      window.location.href = url;
  });**/

</script>

