@extends("backend.layouts.backend")
@section('user-podcast-manage-active')
    active
@endsection
@section('user-podcast-show')
    show
@endsection
@section("body")
    data-spy="scroll" data-target="#navSection" data-offset="140"
@endsection
@section("style")
    
    <!-- BEGIN PAGE LEVEL CUSTOM STYLES -->
    <link href="{{ asset('backend') }}/assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link rel="{{ asset('backend') }}/stylesheet" type="text/css" href="assets/css/forms/theme-checkbox-radio.css">
    <link href="{{ asset('backend') }}/assets/css/tables/table-basic.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('backend') }}/plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend') }}/plugins/table/datatable/dt-global_style.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/editors/markdown/simplemde.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend') }}/plugins/select2/select2.min.css">
    <!-- END PAGE LEVEL CUSTOM STYLES -->
@endsection
@section("wrapper")
          <div class="layout-px-spacing">
                
                <div class="row layout-top-spacing">
                
                    <div class="col-xl-8 col-lg-8 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-6">
                            <div class="table-responsive mb-4 mt-4">
                                <table id="zero-config" class="table table-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Podcast Name</th>
                                            <th> Audios</th>
                                            <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            
                                            <td><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle table-cancel"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></td>
                                        </tr>
                                        
                                    </tbody>
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-sm-12  layout-spacing">
                        <div class="row layout-top-spacing">

                                <div id="addChannel" class="col-lg-12 layout-spacing">
                                    <div class="statbox widget box box-shadow">
                                        <div class="widget-header">
                                            <div class="row">
                                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                    <h4>Add Podcast</h4>
                                                </div>                 
                                            </div>
                                        </div>
                                        <div class="widget-content widget-content-area">
                                            <form class="simple-example"  method="post" id="upload_form" enctype="multipart/form-data" novalidate>
                                                @csrf
                                                <div class="form-row">
                                                    <div class="col-md-12 mb-4">
                                                        <label for="name">Podcast Name</label>
                                                        <input type="text" class="form-control" name="name" id="name" placeholder="" value="" required>
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                        <div class="invalid-feedback">
                                                            Please fill the Category name
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mb-4">
                                                        <label for="name">Podcast Thumbnail</label>
                                                        <input type="file" name="image" id= "image" class="form-control">
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mb-4">
                                                        <label for="name">Description</label>
                                                        <textarea id="demo2" name="description"></textarea>
                                                        
                                                    </div>
                                                    <div class="col-md-12 mb-4">
                                                        <label for="id">Category</label>
                                                        <select class="form-control  basic"  id="id" name="category_id">
                                                                        @foreach(App\Models\UserAudioCategory::get() as $cat)
                                                                <option value="{{$cat->id}}">{{$cat->category_name}}</option>
                                                                @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-12 mb-4">
                                                        <label for="idSub">Sub Category</label>
                                                        <select class="form-control  basic"  id="idSub" name="subcategory_id">
                                                                        
                                                        </select>
                                                    </div>
                                                    <div class="col-md-12 mb-4">
                                                        <label for="idTag">Tags</label>
                                                        <select class="form-control  basic" name="tag_names[]" id="idTag" multiple>
                                                                        @foreach(App\Models\UserAudioTag::get() as $tag)
                                                                <option value="{{$tag->audio_tag_name}}">{{$tag->audio_tag_name }}</option>
                                                                @endforeach
                                                        </select>
                                                    </div>
                                                <div class="col-md-12 mb-4">
                                                    <label>Audio Type</label>
                                                    <div class="n-chk">
                                                        <label class="new-control new-radio radio-primary">
                                                          <input type="radio" class="new-control-input" name="price_type" onclick="hidePrice()" value="0" checked>
                                                          <span class="new-control-indicator"></span>Free
                                                        </label>
                                                        <label class="new-control new-radio radio-primary">
                                                          <input type="radio" class="new-control-input" name="price_type" onclick="showPrice()" value="1">
                                                          <span class="new-control-indicator"></span>Premium
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-4" id="price">
                                                    <label for="title">Price</label>
                                                    <input type="text" class="form-control" id="title" placeholder="" value="" name="price">
                                                </div>
                                                <div class="col-md-12 mb-4" id="dprice">
                                                    <label for="title">Discount Price</label>
                                                    <input type="text" class="form-control" id="title" placeholder="" value="" name="discount" >
                                                </div>
                                                </div>
                                                <button class="btn btn-primary submit-fn mt-2" id="addBtn" onclick="addData()" type="submit">Add Podcast</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    </div>

                </div>

            </div>
@endsection
@section("script")
<!--  BEGIN CUSTOM SCRIPTS FILE  -->
    <script src="{{ asset('backend') }}/assets/js/scrollspyNav.js"></script>
    <script src="{{ asset('backend') }}/assets/js/forms/bootstrap_validation/bs_validation_script.js"></script>
    <script src="{{ asset('backend') }}/plugins/editors/markdown/simplemde.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/editors/markdown/custom-markdown.js"></script>
    <script src="{{ asset('backend') }}/plugins/select2/select2.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/select2/custom-select2.js"></script>
    <!--  END CUSTOM SCRIPTS FILE  -->
<script src="{{ asset('backend') }}/plugins/highlight/highlight.pack.js"></script>
<!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{ asset('backend') }}/plugins/table/datatable/datatables.js"></script>
    <script>
        $('#zero-config').DataTable({
            "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
        "<'table-responsive'tr>" +
        "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
               "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 7 
        });
    </script>
    <!-- END PAGE LEVEL SCRIPTS -->
</script>
<script type="text/javascript">
        $('#price').hide();
        $('#dprice').hide();
        function showPrice(){
            $('#price').show();
            $('#dprice').show();
        }
        function hidePrice(){
            $('#price').hide();
            $('#dprice').hide();
        }
    </script>
    
<script type="text/javascript">
    $('#addT').show();
    $('#updateT').hide();
    $('#addBtn').show();
    $('#updateBtn').hide();
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }
    })
    function addPage(id)
    {
        console.log(id);
        var url = "{{route('channel.add.video', '')}}"+"/"+id;
        //window.location.href=url;
     }
                
    function clearData(){
      var name = $('#name').val('');
      var image = $('#image').val('');
     }
     function allData() {
        $.ajax({
          type: "GET",
          dataType: "json",
          url: "/user/flexflix/podcast/all",
          success:function (response) {
            var data = "";
            $.each(response, function(key,value){
                var id =  parseInt(value.id);
                var url = "{{route('podcast.all.audio', '')}}"+"/"+value.id;
                
                
                console.log(id);
              data = data + "<tr>"
              data = data + "<td>" +value.name+ "</td>"
              data = data + "<td>"
              data = data + "<a  href = "+url+" class = 'btn btn-primary mr-2 btn-sm'> Add Audio </a>"
              data = data + "</td>"
              data = data + "<td>"
              data = data + "<button  onclick='addPage("+id+")'  class = 'btn btn-primary mr-2 btn-sm'> Update </button>"
              data = data + "</td>"
              
              data = data + "</tr>"
            })
            $('tbody').html(data);
          }

        })
      }
      allData()
    

      $('#upload_form').on('submit', function(event){
      event.preventDefault();
      $.ajax({
       url:"{{ url('/user/flexflix/podcast/store') }}",
       method:"POST",
       data:new FormData(this),
       dataType:'JSON',
       contentType: false,
       cache: false,
       processData: false,
       success:function(data)
       {
        clearData()
            allData()
            console.log(data);
       }
      })
     });
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $('select[name="category_id"]').on('change', function(){
        var category_id = $(this).val();
        if(category_id) {
            $.ajax({
                url: "{{  url('/user/book/category/ajax/') }}/"+category_id,
                type:"GET",
                dataType:"json",
                success:function(data) {
                    console.log(data)
                    $('select[name="subcategory_id"]').html('');
                   var d =$('select[name="subcategory_id"]').empty();
                      $.each(data, function(key, value){

                          $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.book_sub_category_name + '</option>');

                      });

                },

            });
        } else {
            alert('danger');
        }

    });

});
</script>
@endsection