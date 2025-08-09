<section class="custom-container latest-events-section">
    <div class="sec-title">
      <p class="title-top text-uppercase text-center">Projects</p>
      <h2 class="title text-capitalize text-center">Latest from Our Department</h2>
    </div>
    <div class="events-slider-arrows d-flex flex-row align-items-center justify-content-end gap-2">
      <div>
        <img src="{{asset('front/assets/images/news-prev-arrow.svg')}}" class="prev-arrow arrows" alt="" />
      </div>
      <div>
        <img src="{{asset('front/assets/images/news-next-arrow.svg')}}" class="next-arrow arrows" alt="" />
      </div>
    </div>
    <div class="latest-events-slider-box pt-4">
      <div class="latest-events-slider">
  
        @foreach($projects as $project)
        <div>
          <div class="events-item position-relative">
            <div class="events-image" style="background-image: url('{{$project->getFirstMediaUrl('work-project')}}');"></div>
            <div class="events-details-box">
              <div class="events-details">
                <button class="btn fullscreen" d-data="{{ $project->getFirstMediaUrl('work-project') }}"><i
                  class="fa fa-expand"></i></button>
                <div class="d-flex flex-column description align-items-start">
                  <div style="margin-top: 60px;">
                    <span class="text-uppercase title-sm">{{ $project->status }}</span>
                  </div>
                  <div class="m-title" title="{{$project->title}}"> {{ \Str::limit($project->title, 35)}} </div>
                  <div class="newsdtail">
                    <h4>Approved PC1 Cost: {{ $project->approved_pc1_cost }}</h4>
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
  
      </div>
    </div>
  </section>
  
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <img src="" id="showImage" alt="">
            </div>
        </div>
    </div>
  </div>
  @section('script')
    <script>
        $(document).ready(function() {
            $('.fullscreen').click(function() {
                let value = $(this).attr('d-data');
                let img = $("#showImage")
                let path = value
                img.attr('src', path)
                $('#exampleModal').modal('show');
            });
        });
    </script>
  @endsection
  