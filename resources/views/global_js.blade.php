<script>
    let enableContentPush = false;

    function sidebarControl() {
        let sidebar = $('#legionweb-sidebar');
        let contentHolder = $('#content-holder');

        if(sidebar.data().visible) {
            sidebar.addClass('-translate-x-full');
            contentControl(sidebar.data().visible);
            sidebar.data().visible = false;
        } else {
            sidebar.removeClass('-translate-x-full')
            contentControl(sidebar.data().visible);
            sidebar.data().visible = true;
        }

        function contentControl(hide = true) {
            /* Slide content data to the right so it looks nice :) */
            if(enableContentPush)
            {
                let contentHolder = $('#content-holder');

                let removedClass = hide ? 'ml-[264px]' : '';
                let addedClass = hide ? '' : 'ml-[264px]';

                contentHolder.removeClass(removedClass);
                contentHolder.addClass(addedClass);
            }
        }
    }

    document.addEventListener('output-news-detail', function(e) {
        let post = e.detail;
        console.log(post);

        $('#post-title').html(post[0].PostTitle)
        $('#post-body').html(post[0].PostBody)
        $('#post-by').html(post[0].PostedBy)
        $('#post-date').html(post[0].PostDate)
    });

    document.addEventListener('output-downloads', function(e) {
        let downloadsInfo = e.detail;
        console.log(e);
        let downloadsHolder = $("#downloads-holder");
        downloadsHolder.html('');
        console.log(downloadsInfo);
        downloadsHolder.append(downloadsInfo);

    });

    function redirectDownload(url)
    {
        window.open(url, '_blank').focus();
    }


</script>
