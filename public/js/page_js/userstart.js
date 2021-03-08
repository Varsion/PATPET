var totalPageasd = 2;
$.ajax({
    //请求方式
    type: "get",
    cache: true,
    url:"/api/like/likes",
    dataType: 'json',
    async: false,
    success: function(result) {
        totalPageasd = result.data.last_page
    },
    error: function(e) {

    }
});
$.jqPaginator('#pagination', {
    totalPages: totalPageasd,
    visiblePages: 8,
    currentPage: 1,
    prev: '<a class="page-numbers prev inactive" href="javascript:;">Prev</a>',
    next: '<a class="page-numbers next" href="javascript:void(0);">Next</a>',
    page: '<a class="page-numbers" href="javascript:;">{{page}}</a>',
    onPageChange: function(num, type) {
        $.ajax({
            type: "get",
            cache: true,
            url:"/api/like/likes?page="+num,
            dataType: 'json',
            async: true,
            success: function(result) {
                totalPageasd = result.data.last_page
                var str = '';
                    for (var i = 0; i < result.data.data.length; i++) {
                        str +=`
                            <article class="brick entry format-standard animate-this">

                                <div class="entry-thumb">
                                    <a href="single.html?article=${result.data.data[i].id}" class="thumb-link">
                                        <img src="${result.data.data[i].path}" alt="building">
                                    </a>
                                </div>

                                <div class="entry-text">
                                    <div class="entry-header">

                                        <div class="entry-meta">
                                            <span class="cat-links">
                                                <a href="#">${result.data.data[i].username}</a>
                                            </span>
                                        </div>
                                        <h1 class="entry-title"><a href="single-standard.html">${result.data.data[i].title}</a></h1>
                                    </div>
                                </div>

                            </article>
                        `
                    }
                    $('#article-content').empty();
                    $('#article-content').append(str);
            },
            error: function(e) {
            }
        });
    }
});