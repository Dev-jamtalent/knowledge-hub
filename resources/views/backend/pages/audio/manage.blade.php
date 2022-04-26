@extends("backend.layouts.backend")
@section('user-temp-manage-active')
    active
@endsection
@section('user-audio-show')
    show
@endsection
@section("body")
	data-spy="scroll" data-target="#navSection" data-offset="140"
@endsection

@section("style")
	
  
    <link href="{{ asset('backend') }}/assets/css/components/cards/card.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL STYLES -->
@endsection
@section("wrapper")
		  <!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<div class="row">
					@foreach($audios as $audio)
					<div class="col-xl-4 col-md-4 col-12">
						<div id="card_9" class=" layout-spacing mt-5">
                            <div class="statbox widget box box-shadow">
                        		<div class="widget-content widget-content-area">

                                    <div class="card component-card_9">
                                        <img src="{{ asset($audio->image) }}" class="card-img-top img-fluid" alt="widget-card-2">
                                        <div class="card-body">
                                            <p class="meta-date">25 Sep 2020</p>

                                            <h5 class="card-title">{{$audio->title}}</h5>
                                            <p class="card-text">{{$audio->s_description}}</p>

                                            <div class="meta-info">
                                                <div class="meta-action">
                                                    <div class="meta-likes">
                                                    	<a href=""><span style="color: black; padding-right: 5px"><img src="{{ asset('backend') }}/icon/edit.svg" width="20px"></span></a>
		                                               
                                                    	<a href="{{$audio->id}}" data-toggle="modal" data-target="#exampleModalCenter{{$audio->id}}"><span style="color: black; padding-right: 5px"><img src="{{ asset('backend') }}/icon/trash-2.svg" width="20px"></span></a>
		                                                    	<!-- Modal -->
		                                    <div class="modal fade" id="exampleModalCenter{{$audio->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		                                        <div class="modal-dialog modal-dialog-centered" role="document">
		                                        	<form action="{{route('audio.delete',$audio->id)}}" method="POST">
		                                        		@csrf
		                                        		<div class="modal-content">
			                                                <div class="modal-header">
			                                                    <h5 class="modal-title" id="exampleModalCenterTitle">Delete Audio</h5>
			                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			                                                      <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
			                                                    </button>
			                                                </div>
			                                                <div class="modal-body">
			                                                    <h4 class="modal-heading mb-4 mt-2">Are You Want to sure delete This audio?</h4>
			                                                    <p class="modal-text">{{$audio->title}}</p>
			                                                        
			                                                </div>
			                                                <div class="modal-footer">
			                                                    <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
			                                                    <input type="submit" name="" class="btn btn-primary" value="Save">
			                                                   
			                                                </div>
			                                            </div>
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
                     	</div>
					</div>
					@endforeach
					
				</div>
				 
			</div>
		</div>	
@endsection
@section("script")
    
    <!-- END PAGE LEVEL SCRIPTS -->

@endsection