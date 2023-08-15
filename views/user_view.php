%% views/header.html %%

<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-header">
        <span class="h4">{{$user['firstName']}} {{$user['lastName']}} &ndash; <a href="mailto:{{$user['email']}}">{{$user['email']}}</a>
      </div>
      <div class="card-body">
        <img class="pull-left float-left mr-4" width="150" src="https://cdn.glitch.com/4c48fd7c-45b3-479f-babb-4a2a09a16f92%2Fuser-image.svg?v=1561513349797">
        <p>{{{nl2br($user['profile'])}}}</p>
      </div>
    </div>
  </div>
</div>
  
<div class="row">
  <div class="col-lg-12">
[[ foreach ($posts as $post) : ]]
  %% views/post_summary.php %%
[[ endforeach; ]]
  </div>
</div>
          
%% views/footer.html %% 