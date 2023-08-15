%% views/header.html %%

<div class="row">
  <div class="col-lg-12">
    <h4>Chirps By @{{ $username }} </h4>
      [[ if(!empty($by)): ]]
        [[ foreach ($by as $chirp) : ]]
          %% views/chirp_summary.php %%
        [[ endforeach; ]]
      [[ else: ]]
        <p>No chirps found by this user.</p>
      [[ endif; ]]
  </div>
</div>

<br/>

<div class="row">
  <div class="col-lg-12">
    <h4>Chirps Mentioning @{{ $username }} </h4>
    [[ if(!empty($at)): ]]
      [[ foreach ($at as $chirp) : ]]
        %% views/chirp_summary.php %%
      [[ endforeach; ]]
    [[ else: ]]
      <p>No chirps found mentioning this user.</p>
    [[ endif; ]]
  </div>
</div>

<div class="row mt-4">
  <div class="col-lg-12">
  <a href="/index"><button class="btn btn-primary mr-1 d-flex justify-content-center align-content-between" ><span class="material-icons">arrow_back</span>&nbsp;Back</button></a>
  </div>
</div>
          
%% views/footer.html %% 
