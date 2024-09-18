<div id="listingcolumn" class="max-w-[30rem] flex-1 flex flex-col border-r-[1px] border-gray-400"> 

  <p class="bg-blue-400 text-white font-bold p-4 text-2xl">
     Jobs
  </p> 
  
  <div class="flex">
    <button id="active" data-button class="relative flex-1 py-2 text-xl border-b-2 border-blue-400">Active
      <i class="absolute left-8 bottom-5 text-[10px] text-green-500 fa-solid fa-circle"></i>
    </button>
    <button id="inactive" data-button class="relative flex-1 text-xl text-gray-500 border-b-2 opacity-[.5]">InActive
      <i class="absolute left-6 bottom-5 text-[10px] text-red-500 fa-solid fa-circle"></i>
    </button>
  </div>
  <ul class="flex px-4 py-2 gap-8 shadow-sm shadow-gray-500">
    <li class="text-sm text-gray-500">Company logo</li>
    <li class="text-sm text-gray-500">Company name</li>
    <li class="text-sm text-gray-500 pr-10">Role</li>
    <li class="text-sm text-gray-500">Date posted</li>
  </ul>
  <div id="all-listings" class="overflow-auto h-[44rem]">
    @if(count($joblistings) != 0)
      @foreach($joblistings as $joblisting)
        <x-employer.listing :joblisting="$joblisting"/>
      @endforeach
  @endif
    </div>  
  </div>


<script>
  let buttonsElem = document.querySelectorAll('[data-button]');
  let allListingsElem = document.getElementById('all-listings');
  let offset = 0;
  let maxResult = false;
  let currentStatus = 'active'; 
  checkCount();

  //// Function to fetch job listings
  function fetchJobListings(status, offset = 0) {
    fetch('/activeInactive', {
      method: 'GET',
      headers: {
        'jobstatus': status,
        'offset': offset
      }
    }).then(response => response.json())
      .then(joblistings => renderData(joblistings))
      .then(()=>{showActionRow();addActionsListener();listingOnClick();}) //callbacks
  }

  //// Event listeners for buttons
  buttonsElem.forEach(element => {
    element.addEventListener('click', () => {
      let status = element.getAttribute("id");
      if (status !== currentStatus) {
        // Reset offset and maxResult when switching status
        offset = 0;
        maxResult = false;
        currentStatus = status;

        // Clear the current listings and fetch new ones
        allListingsElem.innerHTML = '';
        fetchJobListings(status);
      }
      // Update button styles
      untoggleAll();
      addStyle(element);
    });
  });

  

  ///// Fetch more listings when scrolling
  allListingsElem.addEventListener('scroll', () => {
    if (allListingsElem.scrollTop + allListingsElem.clientHeight >= allListingsElem.scrollHeight) {
      addActionsListener();
      if (!maxResult) {
        offset += 8;
        fetchJobListings(currentStatus, offset);
      }
    }
  });

  ///// Render fetched data
  function renderData(joblistings) {
    if (joblistings.length === 0) {
      if (offset === 0) {
        // No initial data and end result is shown
        allListingsElem.innerHTML += '<p id="endresult" class="text-gray-400 p-4">End of results</p>';
        showActionRow();
      } else {
        // Additional end result after scrolling
        maxResult = true;
        allListingsElem.innerHTML += '<p id="endresult" class="text-gray-400 p-4">End of results</p>';
        showActionRow();
      }
      checkDuplicate();
    } else {
      joblistings.forEach(job => {
        let date = formatDate(job.created_at);
        let html = 
        `<article data-joblisting-id="${job.id}" id="joblisting-column" class="relative flex gap-6 border-b-[1px] border-gray-400 py-10 px-4 overflow-hidden shadow-md shadow-gray hover:cursor-pointer">
          <img class="h-6" src={{asset('images/companylogo/company.png')}}>
          <p class="text-md truncate w-[6rem] text-center">${job.companyname}</p>
          <p class="text-md truncate w-[7rem] text-center">${job.role}</p>
          <p class="text-md truncate w-[7rem] text-center">${date}</p>
          <ul data-joblisting-action="${job.id}" id="listing-action" class="hidden absolute bottom-1 left-10 gap-5 p-2">
              <i data-action-draft="${job.id}" class="fa-regular fa-file text-gray-500 hover:text-gray-700"><span class="p-2 text-sm font-sans">Move to drafts</span></i>
              <i data-action-active="${job.id}" class="fa-regular fa-circle-pause text-gray-500 hover:text-gray-700"><span class="p-2 text-sm font-sans">Pause listings</span></i>
              <i data-action-delete="${job.id}" class="fa-solid fa-trash text-red-500 hover:text-red-600"><span class="p-2 text-sm font-sans">Delete</span></i>
          </ul>
        </article>`;
        allListingsElem.innerHTML += html;
      });
      checkCount();
    }
  }

  ///// Check job listings count and add end result
  function checkCount() {
    let joblistingElem = document.querySelectorAll('#joblisting-column');
    if (joblistingElem.length < 8) {
      maxResult = true;
      allListingsElem.innerHTML += '<p id="endresult" class="text-gray-400 p-4">End of results</p>';
      checkDuplicate();
      offset = 0;
    }
  }

  ///// Remove duplicate end result elements
  function checkDuplicate() {
    if (document.querySelectorAll('#endresult').length > 1) {
      document.querySelectorAll('#endresult')[1].remove();
    }
  }

  //// Add style to the active button
  function addStyle(element) {
    element.classList.remove('border-transparent', 'opacity-[.5]');
    element.classList.add('border-b-2', 'border-blue-400');
  }

  //// Remove style from all buttons
  function untoggleAll() {
    buttonsElem.forEach(element => {
      element.classList.add('border-transparent', 'opacity-[.5]');
      element.classList.remove('border-blue-400');
    });
  }

  //// Format date in US format
  function formatDate(created_at) {
    let d = created_at.split('T')[0].split('-');
    const date = new Date(d);
    return date.toLocaleDateString('en-US', {
      month: 'short',
      day: 'numeric',
      year: 'numeric'
    });
  }

</script>

<script>
  /////////////////////////////////////// For listing interactivity///////////////////////
  showActionRow();

function showActionRow(){
    //show every listing action row in each joblistings container
  let listingColumnElem = document.querySelectorAll('#joblisting-column');
  listingColumnElem.forEach(element => {
      element.addEventListener('mouseover',(event)=>{
         event.stopPropagation();
         let listing = document.querySelector(`[data-joblisting-action='${element.dataset.joblistingId}']`);
         hideAllActionColumn();
         listing.classList.remove('hidden');
         listing.classList.add('flex');
      })
  });
}

 //removes actions row after hover outside the listings
document.body.addEventListener('mouseover',()=>{
   hideAllActionColumn();
 })

  function hideAllActionColumn(){
      let allListingActionRow = document.querySelectorAll('[data-joblisting-action]');
       allListingActionRow.forEach(element =>{
           element.classList.add('hidden');
       })
  }

//handle actions listings actions


const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');


addActionsListener();

// add event listener on each actions
function addActionsListener(){

let actionDraftElem = document.querySelectorAll('[data-action-draft]');
let actionActiveElem = document.querySelectorAll('[data-action-active]');
let actionDeleteElem = document.querySelectorAll('[data-action-delete]');



  //handle draft action
  actionDraftElem.forEach((element)=>{
        element.addEventListener('click',()=>{
            const id = element.dataset.actionDraft;
            const action = 'drafts'
            performAction(id,action);
        })
    })

    //handle active action 
    actionActiveElem.forEach((element)=>{
        element.addEventListener('click',()=>{
            const id = element.dataset.actionActive;
            const action = (currentStatus == 'active') ? 'inactive' : 'active';
            performAction(id,action);
        })
    })

    //handle delete action
    actionDeleteElem.forEach((element)=>{
        element.addEventListener('click',()=>{
            const id = element.dataset.actionDelete;
            const action = 'deleted'
            performAction(element,id,action);
        })
    })

}


//Dynamically perform post action based on click button
function performAction(id,action){
  fetch('/performAction',{
            method:'POST',
            headers:{
              'X-Requested-With': 'XMLHttpRequest',
              'X-CSRF-TOKEN': csrfToken,
               'id' : id,
               'action' :action
            } 
          }).then(()=> document.querySelector(`[data-joblisting-id="${id}"]`).remove()) 
}

//Listing onclick 

listingOnClick()
function listingOnClick(){
 let listings = document.querySelectorAll('[data-joblisting-id]');

 listings.forEach((element)=>{
     element.addEventListener('click',()=>{
      const id = element.dataset.joblistingId;
      currentJobId = id;
        fetch('/getListingFullDescription',{
          method:'GET',
          headers:{
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-TOKEN': csrfToken,
            'id' : id,
           }
          }
        ).then(response=>response.text())
         .then((data) =>document.getElementById('listingDescriptionContainer').innerHTML = data)
         .then(()=>addEditDescriptionListener())
     })
 })
}



</script>



