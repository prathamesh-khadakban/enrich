@extends('admin.master')
  
  @section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row justify-content-center">
          <!-- left column -->
          <div class="col-md-8">
            @if(session()->has('message'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i> Alert!</h5>
                    {{ session()->get('message') }}
                  </div>
            @endif
            <!-- general form elements -->
                    <div class="card card-primary">
                      <div class="card-header">
                        <h3 class="card-title">Technical QC - Technical Parameter checking of the content</h3>
                      </div>
                      <!-- /.card-header -->
                      <!-- form start -->
                      <form role="form" method="POST" action="/qc">
                        @csrf
                        <div class="card-body">
                          
                          <div class="form-group">
                            <label for="exampleInputFilename">File Name</label>
                            <input type="text" class="form-control form-control-lg" id="exampleInputFilename" placeholder="File Name" name="file_name" required>
                          </div>
                            
                          <div class="row">
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label>Container</label>
                                <select class="form-control form-control-lg" name="container" required>
                                  <option value="">Select</option>
                                  <option value=".mp4">.mp4</option>
                                  <option value=".mov">.mov</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label>Video Codec</label>
                                <select class="form-control form-control-lg" required name="video_codec">
                                  <option value="">Select</option>
                                  <option value="h.264">h.264</option>
                                  <option value="AAC-LC">AAC-LC</option>
                                  <option value="AVC">AVC</option>
                                </select>
                              </div>
                            </div>
                          </div>

                        <div class="row">
                        	<div class="col-sm-6">
	                          <div class="form-group">
	                            <label>Video Aspect Ratio</label>
	                            <select class="form-control form-control-lg" required name="video_aspect_ratio">
	                              <option value="16*9">16*9</option>
	                              <option value="AAC-LC">4*3</option>
	                            </select>
	                          </div>
	                      	</div>
	                      	<div class="col-sm-6">
	                          	<div class="form-group">
	                            <label>Video Frame Size</label>
	                            <select class="form-control form-control-lg" required name="video_frame_size">
	                              <option value="1920 x 1080 (1080p)">1920 x 1080 (1080p)</option>
	                              <option value="352 x 240 (240p)">352 x 240 (240p)</option>
	                              <option value="480 x 360 (360p)">480 x 360 (360p)</option>
	                              <option value="720 x 480 (480p)">720 x 480 (480p)</option>
	                              <option value="720 x 576 (576p)">720 x 576 (576p)</option>
	                              <option value="1280 x 720 (720p)">1280 x 720 (720p)</option>
	                              <option value="2560 × 1440 (2K)">2560×1440 (2K)</option>
	                              <option value="3840 × 2160 (4K UHD)">3840 × 2160 (4K UHD)</option>
	                              <option value="4096 × 2160 (DCI 4K)">4096 × 2160 (DCI 4K)</option>
	                              <option value="7680 × 4320 (8K UHD)">7680 × 4320 (8K UHD)</option>
	                            </select>
	                          </div>
	                        </div>
                        </div>

                        <div class="row">
                        	<div class="col-sm-6">	
	                          <div class="form-group">
	                            <label>Video Frame Rate</label>
	                            <select class="form-control form-control-lg" required name="video_frame_rate">
	                              <option value="25 fps">25 fps</option>
	                              <option value="30 fps">30 fps</option>
	                              <option value="60 fps">60 fps</option>
	                              <option value="120 fps">120 fps</option>
	                            </select>
	                          </div>
	                        </div>
	                        <div class="col-sm-6">
	                          <div class="form-group">
	                            <label>Video Bitrate</label>
	                            <select class="form-control form-control-lg" required name="video_bitrate">
	                              <option value="1,000 kbps (360p)">1,000 kbps (360p)</option>
	                              <option value="2,500 kbps (480p)">2,500 kbps (480p)</option>
	                              <option value="1,200 - 4,000 kbps (720p)">1,200 - 4,000 kbps (720p)</option>
	                              <option value="4,000-8,000 kbps (1080p)">4,000-8,000 kbps (1080p)</option>
	                              <option value="6,000-10,000 Kbps (2K)">6,000-10,000 Kbps (2K)</option>
	                              <option value="8,000-14,000 kbps (4K)">8,000-14,000 kbps (4K)</option>
	                            </select>
	                          </div>
	                        </div>
                    	</div>

                    	<div class="row">
                        	<div class="col-sm-6">
		                          <div class="form-group">
		                            <label>h.264 profile</label>
		                            <select class="form-control form-control-lg" required name="h_264_profile">
		                              <option value="main">main</option>
		                              <option value="high">high</option>
		                            </select>
		                          </div>
	                        </div>
	                        <div class="col-sm-6">
	                          <div class="form-group">
	                            <label>Audio Sampling Rate</label>
	                            <select class="form-control form-control-lg" required name="audio_sampling_rate">
	                              <option value="44.1 khz">44.1 khz</option>
	                              <option value="48 khz">48 khz</option>
	                            </select>
	                          </div>
	                        </div>
                       	</div>

                          <div class="row">
                        	<div class="col-sm-6">
	                          <div class="form-group">
	                            <label>Audio Bitrate</label>
	                            <select class="form-control form-control-lg" required name="audio_bitrate">
	                              <option value="64 kbps">64 kbps</option>
	                              <option value="128 kbps">128 kbps</option>
	                            </select>
	                          </div>
	                        </div>
	                        <div class="col-sm-6">
	                          <div class="form-group">
	                            <label>Audio Codec</label>
	                            <select class="form-control form-control-lg" required name="audio_codec">
	                              <option value="AAC-LC">AAC-LC</option>
	                              <option value="Other">Other</option>
	                            </select>
	                          </div>
	                        </div>
	                       </div>

	                       <div class="row">
                        	<div class="col-sm-4">
                          <div class="form-group">
                            <label>Audio Channels</label>
                            <select class="form-control form-control-lg" required name="audio_channels">
                              <option value="Mono mix">Mono mix</option>
                              <option value="Stereo">Stereo</option>
                              </select>
                          </div>
                      </div>
                      <div class="col-sm-4">
                          <div class="form-group">
                            <label>Key Frame Interval</label>
                            <select class="form-control form-control-lg" required name="key_frame_interval">
                              <option value="1">1</option>
                              <option value="other">other</option>
                              </select>
                          </div>
                         </div>
                     <div class="col-sm-4">
                          <div class="form-group">
                            <label>Duration</label>
                            <input type="text" class="form-control form-control-lg" id="duration" name="duration" required>
                          </div>

                          
                         
                        </div>
                     </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                      </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
@endsection
  
