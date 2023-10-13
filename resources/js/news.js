export { getNews }

let newsObjectTemplate =
    '<li class="pb-3 pt-3 sm:pb-4 hover:bg-slate-600 px-2 hover:bg-opacity-30 hover:border-r-2 border-blue-500 rounded cursor-pointer" onClick = "toggleNewsView($POSTID$)"> \
        <div class="flex items-center space-x-6"> \
            <div class="flex-shrink-0">\
                <div class="w-8 h-8 small-news-image rounded"></div>\
            </div> \
            <div class="flex-1 min-w-0"> \
                <p class="text-sm font-medium text-gray-300"> \
                    $POSTTITLE$ \
                </p> \
            </div> \
            <div class="text-blue-400 font-medium mb-2">\
            <small>$POSTEDBY$, $POSTEDDATE$</small>\
            </div> \
        </div> \
    </li>';


function getNews (id = false, skipFirst = true) {

    let url = 'api/news';
    if(id) {
        url += '/' + id
    }

    $.ajax({
        type: "GET",
        url: url,
    }).done((data) => {
        if(!id) { // get ALL news for homepage
            let newsHolder = $("#older-news");
            let newsObject = "";

            $.each(data['payload'], (index, news) => {
                if (index == 0) return;
                newsObject = "";

                newsObject = newsObjectTemplate;
                newsObject = newsObject.replace('$POSTTITLE$', news.PostTitle);
                newsObject = newsObject.replace('$POSTBODY$', news.PostBody);
                newsObject = newsObject.replace('$POSTEDBY$', news.PostedBy);
                newsObject = newsObject.replace('$POSTEDDATE$', news.PostDate);
                newsObject = newsObject.replace('$POSTID$', news.PostID);

                newsHolder.append(newsObject)
            })
        } else { // get only 1 news for view
            fillNewsDisplay(data['payload']);
        }

    }).fail((data) => {

    })

    function fillNewsDisplay(data)
    {
        var event = new CustomEvent("output-news-detail", { "detail": data });
        document.dispatchEvent(event);
    }
}



