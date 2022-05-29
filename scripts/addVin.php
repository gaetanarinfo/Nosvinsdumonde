<script src="https://www.nosvinsdumonde.com/assets/js/jquery.min.js"></script>

<script>
    var ACC = {
        config: {}
    };

    var array = [];

    ACC.config.sitePrefixUrl = "https://www.nicolas.com";
    ACC.config.encodedContextPath = "/fr";
    ACC.config.rootPath = "/_ui/desktop";
    ACC.config.CSRFToken = "b7a63faa-9db1-40c9-9d61-9c22522d2e5d";
    ACC.config.mediaUrlPrefix = "https://medias.nicolas.com";
    ACC.labelItemsMiniCart = 'articles';
    ACC.categoryName = "Champagnes";
    ACC.categoryCode = "02";
    ACC.searchWithProduct = "";
    ACC.query = ":relevance";

    var displayedItemPage = 0;

    for (let i = 1; i <= 19; i++) {

        displayedItemPage = i;

        var urls = ACC.config.sitePrefixUrl + ACC.config.encodedContextPath + "/" + ACC.categoryName + "/c/" + ACC.categoryCode + "/results?q=" + ACC.query + "&page=" + displayedItemPage;

        $.getJSON(urls, function(data) {

            array = data['results'];

            array.forEach(e => {

                $.ajax({
                    url: "../ajax/ajax-addAutoLoadUpdate.php",
                    type: 'GET',
                    contentType: "application/x-www-form-urlencoded;charset=utf-8",
                    data: e,
                    success: function(a) {
                        console.log(a);
                    }
                })

            });

        });

    }
</script>