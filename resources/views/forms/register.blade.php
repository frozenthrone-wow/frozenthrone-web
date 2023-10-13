<form class="py-2 px-2" id ="register-form">

    <label for="Username" class="block mb-2 text-sm font-medium text-white">Username</label>
    <div class="flex my-2">
        <input type="text" id="Username" class="rounded-none rounded-r-lg  border   block flex-1 min-w-0 w-full text-sm p-2.5  bg-gray-700 border-gray-600 placeholder-gray-400 text-white " placeholder="Username">
    </div>

    <label for="Password" class="block mb-2 text-sm font-medium text-white">Password</label>
    <div class="flex my-2">
        <input type="password" id="Password" class="rounded-none rounded-r-lg  border   block flex-1 min-w-0 w-full text-sm p-2.5  bg-gray-700 border-gray-600 placeholder-gray-400 text-white " placeholder="****">
    </div>

    <label for="PasswordRepeat" class="block mb-2 text-sm font-medium text-white">Password Repeat</label>
    <div class="flex my-2">

        <input type="password" id="PasswordRepeat" class="rounded-none rounded-r-lg  border   block flex-1 min-w-0 w-full text-sm p-2.5  bg-gray-700 border-gray-600 placeholder-gray-400 text-white " placeholder="****">
    </div>

    <label for="Email" class="block mb-2 text-sm font-medium text-white">Email</label>
    <div class="flex my-2">

        <input type="text" id="Email" class="rounded-none rounded-r-lg  border   block flex-1 min-w-0 w-full text-sm p-2.5  bg-gray-700 border-gray-600 placeholder-gray-400 text-white " placeholder="you@domain.com">
    </div>

    <div class="flex">
        <button type="submit" id="register" class="basis-1/2 text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none  shadow-lg shadow-blue-500/50  font-medium rounded-lg text-sm px-3 py-2.5 text-center mr-1 mb-1">
            REGISTER
        </button>
        <button type="button" id="cancel-registration" class="basis-1/2 border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2.5 text-center mr-2 mb-2  text-blue-400 hover:text-white">
            CANCEL
        </button>
    </div>

</form>

<div id="register-feedback">
    <div class="p-4 mb-4 text-sm rounded-lg text-red-600 hidden" role="alert" id = "error-alert">
        <span class="font-medium">Error!</span> <span id ="error-text"></span>
    </div>
    <div class="p-4 mb-4 text-sm rounded-lg  text-blue-600 hidden" role="alert" id = "success-alert">
        <span class="font-medium">Success!</span> <span id ="success-text"></span>
    </div>
</div>



<script>
    $(document).ready(function() {
        $('#register-form').submit( (event) => {
            event.preventDefault();
            submitRegister();
        })
    })

    function submitRegister() {
        $.ajax({
            type: "POST",
            data: {
                Username: $('#Username').val(),
                Password: $('#Password').val(),
                PasswordRepeat: $('#PasswordRepeat').val(),
                Email: $('#Email').val(),
            },
            url: 'api/register'
        }).done((data) => {
            notifyForm(data.message);
        }).fail((data) => {
            notifyForm(
                data.responseJSON.message,
                1
            )
        })
    }



    function notifyForm(message, type = 0)
    {
        reinitialize();

        let notification = $('#success-alert');
        let text = document.getElementById('success-text');

        switch(type) {
            case 1:
                notification = $('#error-alert');
                text = document.getElementById('error-text');
                break;
        }

        notification.removeClass('hidden');
        text.innerHTML = message;


        notificationLifespan = setInterval(function() {
            notification.addClass('hidden');
            clearInterval(notificationLifespan);
        }, 3000);

        function reinitialize()
        {
            $('#success-alert').addClass('hidden');
            $('#error-alert').addClass('hidden');
        }
    }
</script>
