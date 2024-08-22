<x-layout>
  <x-navbar/>
  <x-searchbar/>
  @if(!empty($joblistings))
  <x-tag/>
  <x-joblistings :joblistings="$joblistings" :joblistingFullDesc="$joblistingFullDesc"/>
    <div class="mt-6 container mx-auto p-4">
      {{$joblistings->links('vendor.pagination.tailwind')}}
     </div>
   @else
  <div>No listing found</div>
   @endif
</x-layout>

