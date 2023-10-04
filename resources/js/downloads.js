export { getDownloads }

let downloadsObjectTemplate =
    '<li class="pb-3 pt-3 sm:pb-4 hover:bg-slate-600 px-2 hover:bg-opacity-30 hover:border-r-2 border-purple-500 rounded cursor-pointer" \
    onClick = "redirectDownload(\'$LINK$\')"> \
        <div class="flex items-center space-x-6"> \
            <div class="flex-shrink-0"> \
                <div class="w-8 h-8 rounded-full download-icon"></div> \
            </div> \
            <div class="flex-1 min-w-0"> \
                <p class="text-sm font-medium text-gray-900 truncate dark:text-white"> \
                $PROVIDER$ \
                </p> \
                <p class="text-sm text-gray-500 truncate dark:text-gray-400"> \
                $LINK$ \
                </p> \
            </div> \
            <div class="text-purple-400 font-medium mb-2"> \
                $DATE$ \
            </div> \
        </div> \
    </li>';


function getDownloads (id = false) {

    let url = 'api/downloads';
    let finalObject = '';

    $.ajax({
        type: "GET",
        url: url,
    }).done((data) => {
        let downloadsObject = "";

        $.each(data['payload'], (index, news) => {
            downloadsObject = "";

            downloadsObject = downloadsObjectTemplate;
            downloadsObject = downloadsObject.replace('$PROVIDER$', news.DownloadProvider);
            downloadsObject = downloadsObject.replace('$LINK$', news.DownloadLink);
            downloadsObject = downloadsObject.replace('$LINK$', news.DownloadLink);
            downloadsObject = downloadsObject.replace('$DATE$', news.DownloadDate);

            finalObject += downloadsObject;
        })

        fillDownloadsData(finalObject);

    }).fail((data) => {

    })
}

function fillDownloadsData(data)
{
    var event = new CustomEvent("output-downloads", { "detail": data });
    document.dispatchEvent(event);
}


