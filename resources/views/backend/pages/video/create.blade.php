@extends("backend.layouts.backend")
@section('breath-com-name')
Vidoe
@endsection
@section('user-video-create-active')
    active
@endsection
@section('user-video-show')
    show
@endsection

@section("style")
	<link href="{{ asset('backend') }}/plugins/file-upload/file-upload-with-preview.min.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="{{ asset('backend') }}/plugins/editors/markdown/simplemde.min.css">
	    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="{{ asset('backend') }}/assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('backend') }}/plugins/select2/select2.min.css">
@endsection
@section("body")
	data-spy="scroll" data-target="#navSection" data-offset="140"
@endsection
@section("wrapper")
<style type="text/css">
	.select2-container--default .select2-selection--multiple{
		background: white!important;
	}
</style>
<div class="layout-px-spacing">
               
    <div class="row layout-top-spacing">
	        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing box-shadow widget-header">
	        	<div class="row layout-top-spacing">

	                <div id="basic" class="col-lg-12 layout-spacing ">
	                    <div class="statbox widget box ">
	                        <div class="widget-header">
	                            <div class="row">
	                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
	                                    <h4>Add Vidoe</h4>
	                                </div>                 
	                            </div>
	                        </div>
	                        <form action="{{route('video.store')}}" method="POST" enctype="multipart/form-data">
	                        	@csrf
		                        <div class="row mt-5">
		                        	<div class="col-md-6">
	                                    <div class="col-md-12 mb-4">
	                                        <label for="title">Video Title</label>
	                                        <input type="text" class="form-control" id="title" placeholder="" name="title" >
	                                    </div>
	                                    <div class="col-md-12 mb-4">
		                                    <div class="custom-file-container" data-upload-id="myFirstImage">
											    <label>Thumbnail (Image) <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
											    <label class="custom-file-container__custom-file" >
											        <input type="file" class="custom-file-container__custom-file__custom-file-input" accept="image/*" name="image">
											        <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
											        <span class="custom-file-container__custom-file__custom-file-control"> Image</span>
											    </label>
											    <div class="custom-file-container__image-preview"></div>
											</div>
										</div>
										
	                                    <div class="col-md-12 mb-4">
	                                        <label for="id">Category</label>
	                                        <select class="form-control  basic"  id="id" name="category_id">
    													    @foreach(App\Models\UserVideoCategory::get() as $cat)
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
    													    @foreach(App\Models\UserVideoTag::get() as $tag)
													<option value="{{$tag->id}}">{{$tag->video_tag_name}}</option>
													@endforeach
											</select>
	                                    </div>
	                                    <div class="col-md-12 mb-4">
	                                    	<label>Template Type</label>
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
		                        <div class="col-md-6">
		                        	<div class="col-md-12 mb-4">
	                                        <label for="title">Description</label>
	                                        <textarea id="demo2" name="description"></textarea>
	                                </div>
	                                <div class="col-md-12 mb-4">
	                                    <label for="dlink">Goolge Drive Link</label>
	                                    <input type="url" class="form-control" id="dlink" placeholder="" name="link_g_drive" value="" >
	                                </div>
	                                <div class="col-md-12 mb-4">
	                                    <label for="dlink">Dropbox Link</label>
	                                    <input type="url" name="link_dropbox" class="form-control" id="dlink" placeholder="" value="" >
	                                </div>
	                                <div class="col-md-12 mb-4">
	                                    <label for="dlink">Youtube Link</label>
	                                    <input type="url" name="link" class="form-control" id="dlink" placeholder="" value="" >
	                                </div>
	                                <div class="col-md-12 mb-4">
	                                    <label for="dlink">Git-hub Link</label>
	                                    <input type="url" name="link_git_hub" class="form-control" id="dlink" placeholder="" value="" >
	                                </div>
	                                <div class="col-md-12 mb-4">
		                                    	<label>Publish</label>
		                                        <div class="n-chk">
												    <label class="new-control new-radio radio-primary">
												      <input type="radio" class="new-control-input" name="podcast" onclick="hideChannel()" value="0" checked>
												      <span class="new-control-indicator"></span>Publish On Now How
												    </label>
												    <label class="new-control new-radio radio-primary">
												      <input type="radio" class="new-control-input" name="podcast" onclick="showChannel()" value="1">
												      <span class="new-control-indicator"></span>Publish On Now How & Flexflix
												    </label>
												</div>
	                                    	</div>
	                                    	<div class="col-md-12 mb-4" id="channel">
	                                        <label for="title">Channel Name</label>
	                                        <select class="form-control  basic"  id="id" name="channel_id">
    													    @foreach(App\Models\Channel::get() as $channel)
													<option value="{{$channel->id}}">{{$channel->name}}</option>
													@endforeach
											</select>
										</div>
	                           		<div class="col-md-12 mb-4">
											<div class="">                                
			                                    <div class="row">
			                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
			                                            <label for="exampleFormControlFile1">Vidoe Upload</label>
			                                        </div>
			                                    </div>
			                                </div>
											 <div class="">
			                                    <div class="form-group mb-4 mt-3">
                                            
		                                            <input type="file" name="file" class="form-control-file" id="exampleFormControlFile1">
		                                            <small  class="form-text text-muted">Max Video size 10 mb</small>
		                                        </div>
                                			</div>
	                                    </div>
	                                </div>
		                        </div>
		                        
		                        <div class="col-md-12">
	                        			<div class="col-md-12 mb-4">
		                                    
		                                    <input type="submit" name="" class="btn btn-primary submit-fn mt-2" value="Add Template">
		                                </div>
	                        		</div>
		                        </div>
		                        <div class="row">
	                        		
	                        	</div>
	                        </form>
	                        </div>
	                        </div>           
	                    </div>

	                </div>
	            </div>
	        </div>
	        


    </div>
    </form>
</div>

@endsection

@section("script")
	<script src="{{ asset('backend') }}/plugins/file-upload/file-upload-with-preview.min.js"></script>
	<script src="{{ asset('backend') }}/plugins/editors/markdown/simplemde.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/editors/markdown/custom-markdown.js"></script>
        <script src="{{ asset('backend') }}/plugins/select2/select2.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/select2/custom-select2.js"></script>

	<script>
        //First upload
        var firstUpload = new FileUploadWithPreview('myFirstImage')
        //Second upload
        var secondUpload = new FileUploadWithPreview('mySecondImage')
    </script>
    <script type="text/javascript">
    	$('#price').hide();
    	$('#dprice').hide();
    	$('#channel').hide();
    	function showPrice(){
    		$('#price').show();
    		$('#dprice').show();
    	}
    	function hidePrice(){
    		$('#price').hide();
    		$('#dprice').hide();
    	}
    	function showChannel(){
    		$('#channel').show();
    		
    	}
    	function hideChannel(){
    		
    		$('#channel').hide();
    	}
    </script>
<script type="text/javascript">
  $(document).ready(function() {
    $('select[name="category_id"]').on('change', function(){
        var category_id = $(this).val();
        if(category_id) {
            $.ajax({
                url: "{{  url('/user/video/category/ajax/') }}/"+category_id,
                type:"GET",
                dataType:"json",
                success:function(data) {
                	console.log(data)
                    $('select[name="subcategory_id"]').html('');
                   var d =$('select[name="subcategory_id"]').empty();
                      $.each(data, function(key, value){

                          $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.video_sub_category_name + '</option>');

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