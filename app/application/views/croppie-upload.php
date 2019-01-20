<style>
    #upload-demo {
        width: 200px;
        height: 300px;
    }
</style>

<div id="upload-demo">
    <input type="file" id="upload" value="Choose a file" accept="image/*" />
</div>



<button class="upload-result">Result</button>

<img id="image-preview" />

<script>
    $(function () {
        var $uploadCrop;

        function readFile(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.upload-demo').addClass('ready');
                    $uploadCrop.croppie('bind', {
                        url: e.target.result
                    }).then(function(){
                        console.log('jQuery bind complete');
                    });

                }

                reader.readAsDataURL(input.files[0]);
            }
            else {
                swal("Sorry - you're browser doesn't support the FileReader API");
            }
        }

        $uploadCrop = $('#upload-demo').croppie({
            viewport: {
                width: 100,
                height: 100
            },
            enableExif: true
        });

        $('#upload').on('change', function () { readFile(this); });
        $('.upload-result').on('click', function (ev) {
            $uploadCrop.croppie('result', {
                type: 'base64',
                format: 'jpg'
            }).then(function(resp) {
                $('#image-preview').attr('src', resp);
            });
        });
    });

</script>