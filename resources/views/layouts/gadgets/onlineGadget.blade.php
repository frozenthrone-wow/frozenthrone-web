<div class="flex w-full space-x-3 mt-3 mb-3 pl-5" id = "online-players-gadget">
    <div class="font-medium text-white">
        <div>Online Players:</div>
    </div>
    <div class="font-medium text-white">
        <div id ="online-player-count">0</div>
        <div class="text-sm text-gray-200"></div>
    </div>
</div>

<script>
$(document).ready(() => {
    getOnlinePlayerCount();
})

function getOnlinePlayerCount() {
    let url = '{{ route('getOnlinePlayerCount') }}';

    $.ajax({
        type: "GET",
        url: url,
    }).done((data) => {
        $('#online-player-count').html(data.payload.players);
    }).fail((data) => {
        $('#online-players-gadget').hide();
    })
}
</script>
