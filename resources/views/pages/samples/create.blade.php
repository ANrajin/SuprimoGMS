@extends('layouts.app')
@push('styles')
    <style>
        #img-preview{
            height: 335px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: #ccc;
        }

        #image{
            width: 420px;
            height: 320px;
        }
    </style>
@endpush
@section('content')
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="card">
                <div class="card-header">Create Sample</div>
                <div class="card-body">
                    <form action="{{route('samples.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Merchandiser</label>
                                    <input type="text" class="form-control" name="merchandiser">
                                </div>
                                <div class="form-group">
                                    <label for="">Buyer</label>
                                    <select name="buyer_id" class="form-control">
                                        <option value="">Select Buyer</option>
                                        @isset($buyers)
                                            @foreach ($buyers as $buyer)
                                                <option value="{{$buyer->id}}">{{$buyer->buyer_name}}</option>
                                            @endforeach
                                        @endisset
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Season</label>
                                    <input type="text" class="form-control" name="season">
                                </div>
                                <div class="form-group">
                                    <label for="">Style No</label>
                                    <input type="text" class="form-control" name="style_no">
                                </div>
                                <div class="form-group">
                                    <label for="">Sample Name</label>
                                    <input type="text" class="form-control" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="">Sample type</label>
                                    <select name="sample_type" class="form-control">
                                        <option value="">Select Sample Type</option>
                                        <option value="Proto sample">Proto sample</option>
                                        <option value="Fit sample">Fit sample</option>
                                        <option value="Size set samplee">Size set sample</option>
                                        <option value="Counter sample">Counter sample</option>
                                        <option value="Salesman sample (SMS)">Salesman sample (SMS)</option>
                                        <option value="Pre-production sample (PPS)">Pre-production sample (PPS)</option>
                                        <option value="Top over production sample (TOP)">Top over production sample (TOP)</option>
                                        <option value="Shipment sample">Shipment sample</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Unit Cost</label>
                                    <input type="text" class="form-control" name="cost">
                                </div>
                                <div class="form-group">
                                    <label for="">Unit Price</label>
                                    <input type="text" class="form-control" name="price">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Product Type</label>
                                    <select name="type_id" class="form-control">
                                        <option value="">Select Product Type</option>
                                        @isset($products)
                                            @foreach ($products as $product)
                                                <option value="{{$product->id}}">{{$product->product_name}}</option>
                                            @endforeach
                                        @endisset
                                    </select>
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="">Design Sketch / Sample Image</label>
                                        <input type="file" id="fileupload" name="image" class="form-control p-2">
                                    </div>
                                    <div class="border" id="img-preview">
                                        <span class="default-text">Sketch/Image Preview</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <label for="">Descriptions</label>
                                <textarea name="desc" rows="15" class="form-control desc"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Specifications</label>
                                <textarea name="spec" rows="5" class="form-control spec"></textarea>
                            </div>
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-light">Submit Sample</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{asset('assets/plugins/tinymce/tinymce.min.js')}}"></script>
    <script>
        $('#fileupload').on('change', function () {
                if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('.default-text').remove();
                    $('#img-preview').html('<img src="'+e.target.result+'" id="image"/>');
                };
                reader.readAsDataURL(this.files[0]);
            }
        });
    </script>
    <script>
        tinymce.init({
            selector: "textarea.spec",
            
            /* width and height of the editor */
            width: "100%",
            height: 300,

            /* display statusbar */
            statubar: true,
            
            /* plugin */
            plugins: [
                "advlist autolink link image lists charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                "save table contextmenu directionality emoticons template paste textcolor"
            ],

            /* toolbar */
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons",
            
            /* style */
            style_formats: [
                {title: "Headers", items: [
                    {title: "Header 1", format: "h1"},
                    {title: "Header 2", format: "h2"},
                    {title: "Header 3", format: "h3"},
                    {title: "Header 4", format: "h4"},
                    {title: "Header 5", format: "h5"},
                    {title: "Header 6", format: "h6"}
                ]},
                {title: "Inline", items: [
                    {title: "Bold", icon: "bold", format: "bold"},
                    {title: "Italic", icon: "italic", format: "italic"},
                    {title: "Underline", icon: "underline", format: "underline"},
                    {title: "Strikethrough", icon: "strikethrough", format: "strikethrough"},
                    {title: "Superscript", icon: "superscript", format: "superscript"},
                    {title: "Subscript", icon: "subscript", format: "subscript"},
                    {title: "Code", icon: "code", format: "code"}
                ]},
                {title: "Blocks", items: [
                    {title: "Paragraph", format: "p"},
                    {title: "Blockquote", format: "blockquote"},
                    {title: "Div", format: "div"},
                    {title: "Pre", format: "pre"}
                ]},
                {title: "Alignment", items: [
                    {title: "Left", icon: "alignleft", format: "alignleft"},
                    {title: "Center", icon: "aligncenter", format: "aligncenter"},
                    {title: "Right", icon: "alignright", format: "alignright"},
                    {title: "Justify", icon: "alignjustify", format: "alignjustify"}
                ]}
            ]
        })
    </script>
    <script>
        tinymce.init({
            selector: "textarea.desc",
            
            /* width and height of the editor */
            width: "100%",
            height: 475,
            /* display statusbar */
            statubar: true,
            
            /* plugin */
            plugins: [
                "advlist autolink link image lists charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                "save table contextmenu directionality emoticons template paste textcolor"
            ],

            /* toolbar */
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons",
            
            /* style */
            style_formats: [
                {title: "Headers", items: [
                    {title: "Header 1", format: "h1"},
                    {title: "Header 2", format: "h2"},
                    {title: "Header 3", format: "h3"},
                    {title: "Header 4", format: "h4"},
                    {title: "Header 5", format: "h5"},
                    {title: "Header 6", format: "h6"}
                ]},
                {title: "Inline", items: [
                    {title: "Bold", icon: "bold", format: "bold"},
                    {title: "Italic", icon: "italic", format: "italic"},
                    {title: "Underline", icon: "underline", format: "underline"},
                    {title: "Strikethrough", icon: "strikethrough", format: "strikethrough"},
                    {title: "Superscript", icon: "superscript", format: "superscript"},
                    {title: "Subscript", icon: "subscript", format: "subscript"},
                    {title: "Code", icon: "code", format: "code"}
                ]},
                {title: "Blocks", items: [
                    {title: "Paragraph", format: "p"},
                    {title: "Blockquote", format: "blockquote"},
                    {title: "Div", format: "div"},
                    {title: "Pre", format: "pre"}
                ]},
                {title: "Alignment", items: [
                    {title: "Left", icon: "alignleft", format: "alignleft"},
                    {title: "Center", icon: "aligncenter", format: "aligncenter"},
                    {title: "Right", icon: "alignright", format: "alignright"},
                    {title: "Justify", icon: "alignjustify", format: "alignjustify"}
                ]}
            ]
        })
    </script>
@endpush