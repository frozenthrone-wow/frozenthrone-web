<div class="flex w-full" id = "online-ranking-gadget">
    <figure class="w-full flex flex-col justify-left py-2 text-left rounded-t-lg md:rounded-t-none md:rounded-tl-lg bg-gray-800 border-gray-700">
        <blockquote class="mb-4 text-gray-500">
            <h3 class="pt-3 pl-3 flex justify-left text-lg font-semibold text-white border-b border-purple-400">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-military-rank mr-3" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M17 7v13h-10v-13l5 -3z"></path>
                    <path d="M10 13l2 -1l2 1"></path>
                    <path d="M10 17l2 -1l2 1"></path>
                    <path d="M10 9l2 -1l2 1"></path>
                </svg>
                TOP {{ config('legionweb.server.about.topRankingNumber') }} PLAYERS
            </h3>
        </blockquote>
        <figcaption class="ml-5">
        <ul class="w-full" id = "ranking-holder">
            <li>
                <ul>No ranking available</ul>
            </li>
        </ul>
        </figcaption>
    </figure>
</div>

<script>
$(document).ready(() => {
    getPlayerRanking();
})

function getPlayerRanking() {
    let url = '{{ route('getPlayerRanking') }}';
    let rankingObjectTemplate =
    '<div class="flex items-start space-x-3"> \
        <div class="space-y-0.5 font-medium text-white text-left w-14"> \
            <div>Lv. $LEVEL$</div> \
        </div> \
        <div class="space-y-0.5 font-medium text-white text-left"> \
            <div>$PLAYERNAME$ | Resets: $PLAYERRESETS$</div> \
            <div class="text-sm text-gray-500 ">$CLASS$</div> \
        </div> \
    </div>';

    $.ajax({
        type: "GET",
        url: url,
    }).done((data) => {
        let rankingHolder = $("#ranking-holder");
        let userObject = "";
        rankingHolder.html('');

        $.each(data['payload'], (index, user) => {
            userObject = "";

            userObject = rankingObjectTemplate;
            userObject = userObject.replace('$LEVEL$', user.PlayerLevel);
            userObject = userObject.replace('$PLAYERNAME$', user.PlayerName);
            userObject = userObject.replace('$PLAYERRESETS$', user.PlayerResets);
            userObject = userObject.replace('$CLASS$', user.PlayerClass);

            rankingHolder.append(userObject)
        })
    }).fail((data) => {
        console.log(data);
    })
}
</script>
