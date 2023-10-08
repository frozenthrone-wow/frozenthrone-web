<!--Modal-->
<div class="news-view-modal modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center z-50">
  <div class="modal-overlay absolute w-full h-full bg-slate-900 opacity-90"></div>

  <div class="modal-container fixed h-full z-50 overflow-y-auto">

	<div class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
      <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
        <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
      </svg>
    </div>

    <!-- Add margin if you want to see grey behind the modal-->
    <div class="modal-content mx-auto text-left min-w-[60vw] text-white">
	  <!--Title-->
      <div class="flex justify-between items-center pb-2">
        <p class="text-2xl font-bold"></p>
      </div>

        <h2 class="font-bold mt-2" id ="post-title">
            $POSTTITLE$
        </h2>

        <p class="mt-5 text-green-400">
            <span id = "post-by"> $POSTEDBY$ </span>,
            <small id ="post-date"> $POSTDATE$ </small>
        </p>

        <div class="pt-8 text-justify break-words md:max-w-4xl max-w-sm text-white" id ="post-body">
            $POSTBODY$
        </div>
    </div>
  </div>
</div>

<script>
    var modalOpen = false;

	var openmodal = document.querySelectorAll('.modal-open')
	for (var i = 0; i < openmodal.length; i++) {
		openmodal[i].addEventListener('click', function(event){
			event.preventDefault()
			toggleNewsView()
		})
	}

	const overlay = document.querySelector('.modal-overlay')
	overlay.addEventListener('click', toggleNewsView)

	var closemodal = document.querySelectorAll('.modal-close')

	for (var i = 0; i < closemodal.length; i++) {
        closemodal[i].addEventListener('click', toggleNewsView)
	}

	document.onkeydown = function(evt) {
		evt = evt || window.event
		var isEscape = false
		if ("key" in evt) {
			isEscape = (evt.key === "Escape" || evt.key === "Esc")
		} else {
			isEscape = (evt.keyCode === 27)
		}
		if (isEscape && document.body.classList.contains('modal-active') && modalOpen) {
			toggleNewsView()
		}
	};


	function toggleNewsView (newsId = false) {
        modalOpen = !modalOpen;
    	const body = document.querySelector('body')
		const modal = document.querySelector('.news-view-modal')

		modal.classList.toggle('opacity-0')
		modal.classList.toggle('pointer-events-none')
		body.classList.toggle('modal-active')

        if(modalOpen)
        {
            // Create the event
            var event = new CustomEvent("display-news-view", { "detail": newsId });

            // Dispatch/Trigger/Fire the event
            document.dispatchEvent(event);
        }
	}


</script>
