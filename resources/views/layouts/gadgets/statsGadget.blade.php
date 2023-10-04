<div class="text-white bg-slate-800 bg-opacity-30">
  <div class="container xl:max-w-7xl mx-auto px-4 py-4 lg:px-8 lg:py-4">
    <div class="grid grid-cols-3 text-center divide-x">
      <dl class="space-y-1 p-5">
        <dt class="text-4xl font-extrabold" id = "account-count">
            -
        </dt>
        <dd class="text-sm uppercase tracking-wide font-semibold text-white">
            Accounts
        </dd>
      </dl>
      <dl class="space-y-1 p-5">
        <dt class="text-4xl font-extrabold" id = "character-count">
            -
        </dt>
        <dd class="text-sm uppercase tracking-wide font-semibold text-white">
            Characters
        </dd>
      </dl>
      <dl class="space-y-1 p-5">
        <dt class="text-4xl font-extrabold" id = "guild-count">
            -
        </dt>
        <dd class="text-sm uppercase tracking-wide font-semibold text-white" >
            Guilds
        </dd>
      </dl>
    </div>
  </div>
</div>

<script>
$(document).ready(() => {
    getServerStatistics();
})

function getServerStatistics() {
    let url = '{{ route('getServerStatistics') }}';
    let guildNumberHolder = $('#guild-count');
    let characterNumberHolder = $('#character-count');
    let accountNumberHolder = $('#account-count');

    $.ajax({
        type: "GET",
        url: url,
    }).done((data) => {
        console.log(data);
        guildNumberHolder.html(data.payload.Guilds);
        characterNumberHolder.html(data.payload.Characters);
        accountNumberHolder.html(data.payload.Accounts);
    }).fail((data) => {

    })
}
</script>

