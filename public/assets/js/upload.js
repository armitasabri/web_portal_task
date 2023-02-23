(function () {
    var input = document.getElementById("image");

    function showUploadedItem (source) {
        var list = document.getElementById("image-list"),
            li = document.createElement("li"),
            img = document.createElement("img");
        img.src = source;
        img.width=400;
        img.height=300;
        li.appendChild(img);
        list.appendChild(li);
    }
    if (input.addEventListener) {
        input.addEventListener("change", function (evt) {
            var i = 0, len = this.files.length, img, reader, file;

            for ( ; i < len; i++ ) {
                file = this.files[i];

                if (!!file.type.match(/image.*/)) {

                }
            }

            if ( window.FileReader ) {
                reader = new FileReader();
                reader.onloadend = function (e) {
                    showUploadedItem(e.target.result);
                };
                reader.readAsDataURL(file);

            }
        }, false);

    }

}
());