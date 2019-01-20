<style>
    #demo-basic {
        width: 200px;
        height: 300px;
    }
</style>
<div id="page">
    <div id="demo-basic">
    </div>
</div>
<button class="basic-result">Result</button>
<img id="image-preview" />
<script>

    $(function() {
        var getUrl = window.location;
        var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];

        var basic = $('#demo-basic').croppie({
            viewport: {
                width: 150,
                height: 200
            }
        });
        basic.croppie('bind', {
            url: baseUrl + '/app/scripts/croppie/demo/demo-1.jpg',
            points: [77, 469, 280, 739]
        });

        $(".basic-result").click(function() {
            basic.croppie('result', {
            type: 'base64',
            format: 'jpg'
            }).then(function(resp) {
                $('#image-preview').attr('src', resp);
            });
        });
    });

</script>