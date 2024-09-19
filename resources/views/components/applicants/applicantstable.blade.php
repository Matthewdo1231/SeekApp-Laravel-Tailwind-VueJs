<div class="w-[1442px]">
    <p class="bg-blue-400 text-white text-center font-bold p-4 text-2xl">
        Applicants
     </p>
     @php
      $stagseObj = $stages[0];
      $stage = explode(',',$stagseObj->employement_stage);
     @endphp  
     <div class="flex">
        @foreach($stage as $item)
      <button id="active" data-button class="relative flex-1 py-2 text-xl border-b-2 border-blue-400">
        {{$item}}
      </button>
      @endforeach
    </div>

</div> 