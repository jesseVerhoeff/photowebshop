    <div class="col-md-12" style="
            padding-top: 50px;
        ">
            <div class="col-md-3">
            </div>
            <div class="col-md-6">
                <form class="form-signin" method="POST" action="/addProduct" enctype="multipart/form-data">

                <div class="form-group row">
                    <label for="productName" class="col-2 col-form-label">Naam</label>
                    <div class="col-10">
                        <input class="form-control" type="text" value="" name="productName" id="productName">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="productDescription" class="col-2 col-form-label">Beschrijving</label>
                    <div class="col-10">
                        <textarea class="form-control" name="productDescription" id="productDescription" rows="3"></textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="productPrice" class="col-2 col-form-label">Prijs</label>
                    <div class="col-10">
                        <input class="form-control" type="number" value="" name="productPrice" id="productPrice">
                    </div>
                </div>

                <!--Photo upload-->

                <div class="form-group row">
                    <input type="file" name="fileToUpload" id="fileToUpload">
                    <p>Voorbeeld:</p> <img src="" id="preview" alt="" height="108" width="192">
                </div>




                <button class="btn btn-primary " type="submit">Add product</button>

                </form>

            </div>

        </div>


    <script type="text/javascript">
        var fileTag = document.getElementById("fileToUpload"),
            preview = document.getElementById("preview");

        fileTag.addEventListener("change", function() {
            changeImage(this);
        });

        function changeImage(input) {
            var reader;

            if (input.files && input.files[0]) {
                reader = new FileReader();

                reader.onload = function(e) {
                    preview.setAttribute('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

