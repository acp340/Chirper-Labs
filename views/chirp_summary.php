<div class="row mt-4">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-header">
        <span class="h4"><a href="/chirp/username/{{$chirp['username']}}">@{{$chirp['username']}}</a></span> <span class="text-muted float-right">{{time2str($chirp['datestamp'])}}</span>
      </div>
      <div class="card-body">
        {{{$chirp['chirp_content']}}}
      </div>
    </div>
  </div>
</div>
