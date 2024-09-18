<x-layout>
    <!--parent container-->
 <div class="flex flex-row h-screen justify-center">
        <x-employer.sidebar/>
        <x-employer.listingscolumn :joblistings="$joblistings"/>
        <x-employer.jobfulldescription/>
        <x-employer.applicantlistcolumn/>
        
  </div>
 
</x-layout>