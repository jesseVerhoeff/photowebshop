<script src="../../js/jquery-3.2.1.js"></script>
<script src="../../js/parsley.min.js"></script>

<div class="col-md-12" style="
            padding-top: 50px;
        ">
            <div class="col-md-3">
            </div>
            <div class="col-md-6">
                <div class="bs-callout bs-callout-warning hidden">
                    <h4>Oh snap!</h4>
                    <p>This form seems to be invalid :(</p>
                </div>

                <div class="bs-callout bs-callout-info hidden">
                    <h4>Yay!</h4>
                    <p>Everything seems to be ok :)</p>
                </div>
                <form data-parsley-validate="" class="form-signin" method="POST" action="/addProduct" enctype="multipart/form-data" id="form">

                <div class="form-group row">
                    <label for="productName" class="col-2 col-form-label">Naam</label>
                    <div class="col-10">
                        <input class="form-control" type="text" value="" name="productName" id="productName" required="">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="productDescription" class="col-2 col-form-label">Beschrijving</label>
                    <div class="col-10">
                        <textarea class="form-control" name="productDescription" id="productDescription" rows="3"  data-parsley-maxlength="255"></textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="productCategory" class="col-2 col-form-label">Categorie</label>
                    <select class="selectpicker" id="productCategory" name="productCategory">
                        <option>Landen</option>
                        <option>Modellen</option>
                        <option>Nieuws</option>
                    </select>

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

        $(function () {
            $(function () {
                $('#form').parsley().on('field:validated', function() {
                    var ok = $('.parsley-error').length === 0;
                    $('.bs-callout-info').toggleClass('hidden', !ok);
                    $('.bs-callout-warning').toggleClass('hidden', ok);
                })
                    .on('form:submit', function() {
                        return false; // Don't submit form for this demo
                    });
            });

    </script>

